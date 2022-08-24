<?php

namespace App\Http\Livewire\Admin\Information;

use App\Models\Information;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use AuthorizesRoleOrPermission,WithFileUploads,LivewireAlert;
    public $information,$information_id,$address, $phone, $email, $map, $active, $ordering;

    public function mount()
    {

//        $this->authorizeRoleOrPermission('information-create');

    }


    private function resetInputFields()
    {
        $this->address = '';
        $this->phone = '';
        $this->email = '';
        $this->map = '';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'address' => 'nullable',
            'phone' => 'required',
            'email' => 'required',
            'map' => 'required',

        ]);
    }

    public function store()
    {
        $this->validate(
            [
                'address' => 'nullable',
                'phone' => 'required',
                'email' => 'required',
                'map' => 'required',
            ],
            [
                'address.required' => 'Address field is required',
                'phone.required' => 'Phone field is required',
                'email.required' => 'Email field is required',
                'map.required' => 'Map field is required',

            ],
        );
        $information = new Information();
        $information->address = $this->address;
        $information->phone = $this->phone;
        $information->email = $this->email;
        $information->map = $this->map;


        $information->save();
        $this->alert('success', 'Information has been created Successfully');
        $this->resetInputFields();
        return redirect()->route('admin.information');

    }
    public function render()
    {

        return view('livewire.admin.information.create')->extends('layouts.admin');
    }
}
