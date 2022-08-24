<?php

namespace App\Http\Livewire\Frontend\Shop;

use App\Traits\Basket;
use Livewire\Component;

class CartComponent extends Component
{
    use Basket;

    public function render()
    {
        return view('livewire.frontend.shop.cart-component')->extends('layouts.base');
    }
}
