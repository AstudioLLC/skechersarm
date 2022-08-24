<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\Controller;

class LoginComponent extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('livewire.admin.login-component');
    }
}
