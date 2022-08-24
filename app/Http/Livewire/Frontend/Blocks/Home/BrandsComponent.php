<?php

namespace App\Http\Livewire\Frontend\Blocks\Home;

use Livewire\Component;

class BrandsComponent extends Component
{
    public $items;

    public function render()
    {
        return view('livewire.frontend.blocks.home.brands-component');
    }
}
