<?php

namespace App\Http\Livewire\Admin\Polls;

use App\Models\Poll;
use App\Models\PollOption;
use App\Traits\AuthorizesRoleOrPermission;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use AuthorizesRoleOrPermission,LivewireAlert,WithFileUploads;

    public $title,$image;

    public function mount()
    {
        $this->authorizeRoleOrPermission('poll-create');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'image' => 'nullable',
        ]);
    }

    public function store()
    {
        $this->validate(
            [
                'title' => 'required',
                'image' => 'nullable',
            ],
        );
        $item = new Poll();
        $item->title = $this->title;
        $item->image = $this->image;

        if($this->image)
        {
            $img   = \Intervention\Image\Facades\Image::make($this->image)->encode('jpg');
            $destinationPath = public_path('images/polls');
            $name  = time(). '.jpg';
            $item->image = $name;
            $img->fit(800,800)->save($destinationPath.'/'.$name);
            $item->image = $name;
        }


        $item->save();

        $this->alert('success', 'Poll has been created Successfully');
        return redirect()->route('admin.polls');

    }
    public function render()
    {
        return view('livewire.admin.polls.create')->extends('layouts.admin');
    }
}
