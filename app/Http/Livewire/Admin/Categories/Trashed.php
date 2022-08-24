<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Trashed extends Component
{

    use LivewireAlert;
    public $name = 'Trashed Category',$currentPage = 1, $searchTerm,  $ordering;
    public bool $active;


    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            Category::find($item['value'])->update(['ordering' => $item['order']]);
        }
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function restore($id)
    {
        Category::withTrashed()->findOrFail($id)->restore();
        $this->alert('success', 'Category Restored Successfully');
    }

    public function forceDelete(int $id)
    {
        $model = Category::withTrashed()->findOrFail($id);
        if ($model->image){
            $path = public_path().'/images/category/'.$model->image;
            unlink($path);
        }
        

        $model->forceDelete();
        $this->alert('warning', 'Category has been deleted');

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
        $items = Category::onlyTrashed()->where(function($sub_query){
            $sub_query->where('description', 'like', '%'.$this->searchTerm.'%');
        })->paginate(10);
        return view('livewire.admin.categories.trashed',compact('items'))->extends('layouts.admin');
    }
}
