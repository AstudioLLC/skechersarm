<?php

namespace App\Http\Livewire\Admin\Contacts;

use App\Models\Contact;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ContactComponent extends Component
{
    use LivewireAlert, WithPagination;

    public bool $active;

    public $name_contact = 'Contact', $currentPage = 1, $searchTerm,  $ordering;

    public $name;
    public $email;
    public $phone;
    public $message;
    public function delete($id)
    {
        Contact::find($id)->delete();
        $this->alert('warning', 'Contact Deleted Successfully');

    }
    public function render()
    {
        Contact::where('active', 1)->update(['seen' => true]);
        $items = Contact::orderBy('id', 'DESC')->get();
        return view('livewire.admin.contacts.contact-component',compact('items'))->extends('layouts.admin');
    }
}
