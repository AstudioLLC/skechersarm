<?php

namespace App\Http\Livewire\Frontend\Blocks\Home;

use App\Models\Product;
use App\Traits\Basket;
use Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class NewProductsComponent extends Component
{
    use LivewireAlert;

    public $items;

    public function render()
    {
        return view('livewire.frontend.blocks.home.new-products-component');
    }
}
