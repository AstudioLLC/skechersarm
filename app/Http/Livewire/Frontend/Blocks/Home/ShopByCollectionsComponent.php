<?php

namespace App\Http\Livewire\Frontend\Blocks\Home;

use Livewire\Component;

class ShopByCollectionsComponent extends Component
{
    public $items;

    public function render()
    {
        return view('livewire.frontend.blocks.home.shop-by-collections-component');
    }
}
