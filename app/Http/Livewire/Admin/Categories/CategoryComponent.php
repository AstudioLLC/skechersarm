<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use App\Models\Product;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Artisan;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
    use WithPagination,LivewireAlert,AuthorizesRoleOrPermission;

    public $name = 'Categories', $currentPage = 1, $searchTerm,  $ordering;
    public bool $active;

    public function mount()
    {
        $this->authorizeRoleOrPermission('category-list');

    }

    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            Category::find($item['value'])->update(['ordering' => $item['order']]);
            Artisan::call('cache:clear');
        }
    }
    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }
    public function delete($id)
    {
        Category::find($id)->delete();
        $this->alert('error', 'Category Deleted Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);

    }
    public function render()
    {

        $query = '%'.$this->searchTerm.'%';
        $last = request()->segment(count(request()->segments()));
        if (preg_match('~[0-9]+~',$last))
        {
            $productCategories = Category::with('childCategories.childCategories')
                ->where('category_id',$last)
                    ->orderBy('ordering','ASC')->where(function($sub_query){
                        $sub_query->where('name', 'like', '%'.$this->searchTerm.'%');
                            })->paginate(20);
        }else {
        $productCategories = Category::with('childCategories.childCategories')
            ->whereNull('category_id')
                ->orderByRaw('-category_id ASC')
                    ->orderBy('ordering','ASC')->where(function($sub_query){
                        $sub_query->where('name', 'like', '%'.$this->searchTerm.'%');
                            })->paginate(20);
        }

        return view('livewire.admin.categories.category-component',compact('productCategories'))->extends('layouts.admin');
    }
}
