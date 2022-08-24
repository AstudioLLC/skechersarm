<?php

namespace App\Http\Livewire\Admin\SocialNetwork;

use App\Models\SocialNetwork;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use AuthorizesRoleOrPermission,WithFileUploads,LivewireAlert;
    public $title, $url, $image;

    public function mount()
    {

//        $this->authorizeRoleOrPermission('information-create');

    }


    private function resetInputFields()
    {
        $this->title = '';
        $this->url = '';
        $this->image = '';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'nullable',
            'url' => 'required',
            'image' => 'image|mimes:jpeg,png',

        ]);
    }

    public function store()
    {
        $this->validate(
            [
                'title' => 'nullable',
                'url' => 'required',
                'image' => 'required|image|mimes:jpeg,png',
            ],
            [
                'title.required' => 'Title field is required',
                'url.required' => 'Url field is required',
                'image.mimes' => 'Image must bu a type png or jpg'
            ],
        );
        $socialNetwork = new  SocialNetwork();
        $socialNetwork->title = $this->title;
        $socialNetwork->url = $this->url;
        if($this->image)
        {
            $imageName = Carbon::now()->timestamp. '.' . $this->image->getClientOriginalName();
            $this->image->storeAs('images/social_network',$imageName);
            $socialNetwork->image = $imageName;
        }
        $socialNetwork->save();
        $this->alert('success','Network Created Successfully');
        return redirect()->route('admin.social_network');
    }
    public function render()
    {
        return view('livewire.admin.social-network.create')->extends('layouts.admin');
    }
}
