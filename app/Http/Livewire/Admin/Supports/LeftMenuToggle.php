<?php

namespace App\Http\Livewire\Admin\Supports;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LeftMenuToggle extends Component
{
    public function setToggle($key,$value)
    {
        if (Session::exists(['Toggled','False'])){
            Session::forget(['Toggled','False']);
        }
        Session::put([$key => $value]);
    }
    public function render()
    {
        return view('livewire.admin.supports.left-menu-toggle');
    }
}
