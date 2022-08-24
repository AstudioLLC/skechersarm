<?php

namespace App\Http\Livewire\Admin\Supports;

use App\Models\Criteria;
use App\Models\Filter;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ProductCriterias extends Component
{
    use LivewireAlert;

    public $product_id;
    public $product;

    public function mount($product_id)
    {
        $this->product_id = $product_id;
        $this->product = Product::whereid($product_id)->first();
    }
    public function detach($criteria_id)
    {
        $this->product->criteries()->wherePivot('criteria_id','=',$criteria_id)->detach();
        $this->alert('error', 'Detached Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);
    }
    public function attach($criteria_id)
    {
        $this->product->criteries()->attach($criteria_id);
        $this->alert('success', 'Attached Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);
    }

    public function render()
    {
        $filters = Filter::with('criteries')->get();
        $item = Product::whereId($this->product_id)->with('categories.filters.criteries','categories.parentCategory.parentCategory.parentCategory','criteries')->first();

        return view('livewire.admin.supports.product-criterias',compact('filters','item'))->extends('layouts.admin');
    }
}
