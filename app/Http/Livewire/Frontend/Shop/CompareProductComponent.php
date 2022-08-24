<?php

namespace App\Http\Livewire\Frontend\Shop;

use App\Traits\Basket;
use Livewire\Component;

class CompareProductComponent extends Component
{
    use Basket;

    public function render()
    {
        return view('livewire.frontend.shop.compare-product-component')->extends('layouts.base');
    }
}
