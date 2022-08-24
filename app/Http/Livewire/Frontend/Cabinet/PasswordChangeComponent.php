<?php

namespace App\Http\Livewire\Frontend\Cabinet;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PasswordChangeComponent extends Component
{
    use LivewireAlert;
    public $password;

    public $current_hashed_password;
    public $current_password_for_email;
    public $current_password;
    public $password_confirmation;

    protected function rules()
    {
        $params = [
            'password' => 'nullable|min:6|different:current_password',
            'password_confirmation' => 'sometimes|same:password',
        ];

        if (!empty($this->password))
        {
            $params['current_password'] = ['required', 'customPassCheckHashed:'.$this->current_hashed_password];
        }

        return $params;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules());
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->userId = auth()->user()->id;
        $model = User::find($this->userId);

        $this->current_hashed_password = $model->password;
    }
    public function save()
    {
        $this->validate();
        $data = [];

        // We will check if there are any changes in the fields

        if (!empty($this->password)) {
            $data = array_merge($data, ['password' => Hash::make($this->password)]);
        }

        if(count($data)) {
            User::find($this->userId)->update($data);
            $this->alert('success', 'Password has been updated successfully ', [
                'position' => 'bottom-end',
                'timer' => '3000',
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
    }
    public function render()
    {
        return view('livewire.frontend.cabinet.password-change-component')->extends('layouts.base');
    }
}
