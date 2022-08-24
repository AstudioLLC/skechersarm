<?php

namespace App\Http\Livewire\Frontend\Cabinet;

use App\Traits\Basket;
use Livewire\Component;

class FavoriteProductsComponent extends Component
{
    use Basket;
    public function render()
    {
        return view('livewire.frontend.cabinet.favorite-products-component')->extends('layouts.base');
    }
}
