<?php

namespace App\Http\Livewire\Frontend\Pages\Static;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;

class BrandComponent extends Component
{
    public $url;
    public $brand;
    public $items;

    public function mount($url)
    {

        $this->url = $url;
        $this->brand = Brand::where('url',$url)->first();
        $this->items = Product::where('brand_id', $this->brand->id)->whereActive(true)->get();

    }
    public function render()
    {
        return view('livewire.frontend.pages.static.brand-component')->extends('layouts.base');
    }
}
