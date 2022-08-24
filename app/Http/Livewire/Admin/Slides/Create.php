<?php

namespace App\Http\Livewire\Admin\Slides;

use App\Models\Slide;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\AuthorizesRoleOrPermission;

class Create extends Component
{
    use AuthorizesRoleOrPermission,WithFileUploads,LivewireAlert;
    public $slides,$slide_id,$button, $image, $description, $title,$url, $active, $ordering;

    public function mount()
    {
        $this->authorizeRoleOrPermission('slide-create');
    }


    private function resetInputFields()
    {
        $this->url = '';
        $this->title = '';
        $this->image = '';
        $this->description = '';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'nullable',
            'url' => 'required',
            'button' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png',

        ]);
    }

    public function store()
    {
        $this->validate(
            [
                'title' => 'nullable',
                'url' => 'required',
                'button' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png',
            ],
            [
                'title.required' => 'Title field is required',
                'url.required' => 'Url field is required',
                'description.required' => 'Description field is required',
                'image.required' => 'Image field is required',
                'image.mimes' => 'Image must bu a type png or jpg'

            ],
        );
        $slide = new Slide();
        $slide->url = $this->url;
        $slide->title = $this->title;
        $slide->description = $this->description;
        $slide->button = $this->button;

        if($this->image)
        {
            $imageName = Carbon::now()->timestamp. '.' . $this->image->getClientOriginalName();
            $this->image->storeAs('images/slides',$imageName);
            $slide->image = $imageName;
        }
        $slide->save();
        $this->alert('success', 'Slide has been created Successfully');
        $this->resetInputFields();
        return redirect()->route('admin.slides');

    }
    public function render()
    {
        return view('livewire.admin.slides.create')->extends('layouts.admin');
    }
}
