<?php

namespace App\Http\Livewire\Frontend\Pages\Static;

use App\Models\Page;
use App\Models\Product;
use App\Traits\Basket;
use Livewire\Component;

class CollectionComponent extends Component
{
use Basket;
    public function render()
    {
        $page = Page::where('static','collection')->first();
        $items = Product::where(['is_collection'=> 1,'active'=>1])->with('categories.parentCategory.parentCategory')->get();
        return view('livewire.frontend.pages.static.collection-component', compact('items','page'))->extends('layouts.base');
    }
}
