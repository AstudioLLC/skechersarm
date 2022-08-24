<?php

namespace App\Http\Livewire\Admin\Contacts;

use App\Models\Contact;
use App\Traits\AuthorizesRoleOrPermission;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use AuthorizesRoleOrPermission, WithFileUploads,LivewireAlert;

    public $name;
    public $phone;
    public $email;
    public $message;
    public $active;
    public $contact_id;

    public function mount($id)
    {
//        $this->authorizeRoleOrPermission('information-edit');

        $contact = Contact::where('id',$id)->first();
        $this->name = $contact->name;
        $this->phone = $contact->phone;
        $this->email = $contact->email;
        $this->message = $contact->message;
        $this->active =1;
        $this->contact_id = $contact->id;

    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'message' => 'required',

        ]);
    }

    public function updateSlide()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'message' => 'required',

        ]);
        $contact = Contact::find($this->contact_id);
        $contact->message = $this->message;
        $contact->phone = $this->phone;
        $contact->email = $this->email;
        $contact->save();
        $this->alert('success', 'Contact been changed successfully');
        return redirect()->route('admin.contact');
    }
    public function render()
    {
        return view('livewire.admin.contacts.edit')->extends('layouts.admin');
    }
}
