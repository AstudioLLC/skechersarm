<?php

namespace App\Http\Livewire\Admin\SocialNetwork;

use App\Models\SocialNetwork;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use  WithFileUploads,LivewireAlert;

    public $title;
    public $url;
    public $image;
    public $newimage;
    public $active;
    public $ordering;

    public function mount($id)
    {
//        $this->authorizeRoleOrPermission('slide-edit');

        $social_network = SocialNetwork::where('id',$id)->first();
        $this->title = $social_network->title;
        $this->url = $social_network->url;
        $this->image = $social_network->image;
        $this->active = $social_network->active;
        $this->social_network_id = $social_network->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'url' => 'required',
            'newimage' => 'nullable|mimes:jpeg,png',
        ]);
    }

    public function updateSlide()
    {
        $this->validate([
            'title' => 'required',
            'url' => 'required',
            'newimage' => 'nullable|mimes:jpeg,png',
        ]);
        $social_network = SocialNetwork::find($this->social_network_id);
        $social_network->title = $this->title;
        $social_network->url = $this->url;
        if($this->newimage)
        {
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->getClientOriginalName();
            $this->newimage->storeAs('images/social_network',$imageName);
            $social_network->image = $imageName;
        }
        $social_network->save();
        $this->alert('success', 'Social Network been changed successfully');
        return redirect()->route('admin.social_network');
    }
    public function render()
    {
        return view('livewire.admin.social-network.edit')->extends('layouts.admin');
    }
}
