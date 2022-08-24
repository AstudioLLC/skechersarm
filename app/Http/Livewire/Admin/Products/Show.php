<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use App\Traits\AuthorizesRoleOrPermission;
use Livewire\Component;

class Show extends Component
{
    use AuthorizesRoleOrPermission;

    public $product;

    public function mount($id)
    {
        $this->authorizeRoleOrPermission('product-list');
        $this->product = Product::whereId($id)->with('categories.filters.criteries','brand')->first();
    }
    public function render()
    {
        return view('livewire.admin.products.show')->extends('layouts.admin');
    }
}
