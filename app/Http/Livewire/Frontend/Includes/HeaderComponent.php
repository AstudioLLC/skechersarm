<?php

namespace App\Http\Livewire\Frontend\Includes;

use App\Traits\frontCategories;
use Livewire\Component;

class HeaderComponent extends Component
{
    use frontCategories;

    protected $listeners = ['refreshComponent'=>'$refresh'];

    public function render()
    {
        return view('livewire.frontend.includes.header-component');
    }
}
