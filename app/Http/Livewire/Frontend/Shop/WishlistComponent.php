<?php

namespace App\Http\Livewire\Frontend\Shop;

use App\Traits\Basket;
use Livewire\Component;

class WishlistComponent extends Component
{
    use Basket;

    public function render()
    {
        return view('livewire.frontend.shop.wishlist-component')->extends('layouts.base');
    }
}
