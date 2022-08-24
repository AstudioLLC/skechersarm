<?php

namespace App\Http\Livewire\Admin\Information;

use App\Models\Information;
use App\Traits\AuthorizesRoleOrPermission;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use AuthorizesRoleOrPermission, WithFileUploads,LivewireAlert;

    public $address;
    public $phone;
    public $email;
    public $map;
    public $active;
    public $ordering;
    public $information_id;

    public function mount($id)
    {
//        $this->authorizeRoleOrPermission('information-edit');

        $information = Information::where('id',$id)->first();
        $this->address = $information->getTranslations('address');
        $this->phone = $information->phone;
        $this->email = $information->email;
        $this->map = $information->map;
        $this->active = $information->active;
        $this->information_id = $information->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
    }

    public function updateSlide()
    {
        $this->validate([
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        $information = Information::find($this->information_id);
        $information->address = $this->address;
        $information->phone = $this->phone;
        $information->email = $this->email;
        $information->map = $this->map;
        $information->save();
        $this->alert('success', 'Information been changed successfully');
        return redirect()->route('admin.route');
    }
    public function render()
    {
        return view('livewire.admin.information.edit')->extends('layouts.admin');
    }
}
