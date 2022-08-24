<?php

namespace App\Http\Livewire\Frontend\Blocks\Home;

use Livewire\Component;

class ShopByCollectionsDiscountComponent extends Component
{
    public $items;

    public function render()
    {
        return view('livewire.frontend.blocks.home.shop-by-collections-discount-component');
    }
}
