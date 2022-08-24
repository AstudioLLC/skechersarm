<?php

namespace App\Http\Livewire\Frontend\Pages\Static;

use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\Information;
use App\Models\Page;
use App\Models\SocialNetwork;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class ContactComponent extends Component
{
    use AuthorizesRoleOrPermission,LivewireAlert;
    public $name, $email, $phone, $message, $active, $ordering;

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';
    }
    public function storeContact()
    {
        $this->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'message' => 'required',
            ],
            [
                'name.required' => 'Name field is required',
                'email.required' => 'Email field is required',
                'phone.required' => 'Phone field is required',
                'message.required' => 'Message field is required',

            ],
        );
        $contact = new Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->message = $this->message;
        $contact->active = 1;


        $contact->save();

        $email = env('MAIL_USERNAME');
        Mail::to($email)->send(new ContactMail($contact));

//        $this->alert('success', 'Contact has been created Successfully');
        $this->resetInputFields();
        return redirect()->route('contact')->with('message', 'Հաղորդագրությունը հաջողությամբ ուղաւրկված է');

    }

    public function render()
    {
        $page = Page::where('static','contacts')->first();
        $social_networks = SocialNetwork::get();
        $information = Information::first();
        return view('livewire.frontend.pages.static.contact-component',compact('social_networks','information','page'))->extends('layouts.base');
    }
}
