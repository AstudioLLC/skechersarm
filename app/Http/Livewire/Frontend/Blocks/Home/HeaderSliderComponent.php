<?php

namespace App\Http\Livewire\Frontend\Blocks\Home;

use Livewire\Component;

class HeaderSliderComponent extends Component
{
    public $items;

    public function render()
    {
        return view('livewire.frontend.blocks.home.header-slider-component');
    }
}
