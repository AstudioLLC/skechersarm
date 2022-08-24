<?php

namespace App\Http\Livewire\Admin\Supports;

use Livewire\Component;

class FormTitle extends Component
{
    public $name;
    public function render()
    {
        return view('livewire.admin.supports.form-title');
    }
}
