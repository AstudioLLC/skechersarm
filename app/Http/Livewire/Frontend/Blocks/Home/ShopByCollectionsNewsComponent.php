<?php

namespace App\Http\Livewire\Frontend\Blocks\Home;

use Livewire\Component;

class ShopByCollectionsNewsComponent extends Component
{
    public $items;
    public function render()
    {
        return view('livewire.frontend.blocks.home.shop-by-collections-news-component');
    }
}
