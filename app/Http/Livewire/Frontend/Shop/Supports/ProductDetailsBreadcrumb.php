<?php

namespace App\Http\Livewire\Frontend\Shop\Supports;

use Livewire\Component;

class ProductDetailsBreadcrumb extends Component
{
    public $item;

    public function render()
    {
        return view('livewire.frontend.shop.supports.product-details-breadcrumb');
    }
}
