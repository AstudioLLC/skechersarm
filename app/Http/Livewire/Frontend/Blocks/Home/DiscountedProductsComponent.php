<?php

namespace App\Http\Livewire\Frontend\Blocks\Home;

use App\Models\HomeBanner;
use App\Models\Product;
use Livewire\Component;

class DiscountedProductsComponent extends Component
{
    public $items;

    public function render()
    {
        $image = HomeBanner::whereSection('sale')->pluck('image')->first();

        return view('livewire.frontend.blocks.home.discounted-products-component',compact('image'));
    }
}
