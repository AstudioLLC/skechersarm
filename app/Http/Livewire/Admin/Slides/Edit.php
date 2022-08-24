<?php

namespace App\Http\Livewire\Admin\Slides;

use App\Models\Slide;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use AuthorizesRoleOrPermission, WithFileUploads,LivewireAlert;

    public $title;
    public $url;
    public $description;
    public $image;
    public $newimage;
    public $active;
    public $button;
    public $ordering;
    public $slide_id;

    public function mount($id)
    {
        $this->authorizeRoleOrPermission('slide-edit');

        $slide = Slide::where('id',$id)->first();
        $this->title = $slide->getTranslations('title');
        $this->button = $slide->getTranslations('button');
        $this->description = $slide->getTranslations('description');
        $this->url = $slide->url;
        $this->image = $slide->image;
        $this->active = $slide->active;
        $this->slide_id = $slide->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'description' => 'required',
            'button' => 'required',
            'newimage' => 'nullable|mimes:jpeg,png',
        ]);
    }

    public function updateSlide()
    {
        $this->validate([
            'title' => 'required',
            'button' => 'required',
            'description' => 'required',
            'newimage' => 'nullable|mimes:jpeg,png',
        ]);
        $slide = Slide::find($this->slide_id);
        $slide->title = $this->title;
        $slide->url = $this->url;
        $slide->button = $this->button;
        $slide->description = $this->description;
        if($this->newimage)
        {
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->getClientOriginalName();
            $this->newimage->storeAs('images/slides',$imageName);
            $slide->image = $imageName;
        }
        $slide->save();
        $this->alert('success', 'Slide been changed successfully');
        return redirect()->route('admin.slides');
    }
    public function render()
    {
        return view('livewire.admin.slides.edit')->extends('layouts.admin');
    }
}
