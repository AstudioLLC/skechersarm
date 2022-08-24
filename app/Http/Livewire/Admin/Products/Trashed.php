<?php

namespace App\Http\Livewire\Admin\Products;


use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Trashed extends Component
{
    use LivewireAlert;
    public $name = 'Trashed Products',$currentPage = 1, $searchTerm,  $ordering;
    public bool $active;


    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            Product::find($item['value'])->update(['ordering' => $item['order']]);
        }
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function restore($id)
    {
        Product::withTrashed()->findOrFail($id)->restore();
        $this->alert('success', 'Product Restored Successfully');
    }

    public function forceDelete(int $id)
    {
        $model = Product::withTrashed()->findOrFail($id);
        if ($model->image){
            $path = public_path().'/images/products/'.$model->image;
            unlink($path);
        }
        if ($model->thumbnail){
            $path = public_path().'/images/products/thumbnail/'.$model->thumbnail;
            unlink($path);
        }

        $model->forceDelete();
        $this->alert('warning', 'Product has been deleted');

    }
    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }


    public function render()
    {

        $items = Product::onlyTrashed()->where(function($sub_query){
            $sub_query->where('name', 'like', '%'.$this->searchTerm.'%');
        })->paginate(10);
        return view('livewire.admin.products.trashed',compact('items'))->extends('layouts.admin');
    }
}
