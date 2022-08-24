<?php

namespace App\Http\Livewire\Frontend\Pages\Static;

use App\Models\Product;

use App\Traits\Basket;
use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class SearchComponent extends Component
{
    use LivewireAlert, Basket;
    public function render(Request $request)
    {
        $product = Product::where([[function ($query) use ($request) {
            $query->orWhere('name', 'LIKE', '%' . $request->search . '%')->get();
        }]])->with('categories.parentCategory.parentCategory')->paginate(20);

        return view('livewire.frontend.pages.static.search-component', compact('product'))->extends('layouts.base');
    }
}
