<?php

namespace App\Http\Livewire\Frontend\Pages\Static;

use App\Models\Page;
use App\Models\Product;
use App\Traits\Basket;
use Livewire\Component;

class DiscountComponent extends Component
{
    use Basket;
    public function render()
    {
        $page = Page::where('static','discounts')->first();
        $items = Product::where(['other'=> 1,'active'=>1])->with('categories.parentCategory.parentCategory')->get();

        return view('livewire.frontend.pages.static.discount-component',compact('items','page'))->extends('layouts.base');
    }
}
