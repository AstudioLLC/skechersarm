<?php

namespace App\Traits;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Information;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;

trait frontCategories
{
    public $frontCategories;
    public $information;
    public $collections;
    public $frontCategoriesFooter;

    public function mount()
    {
//        $this->frontCategories = Category::whereNull('category_id')->whereActive(true)->orderBy('ordering','asc');
        $this->frontCategories =  Category::whereNull('category_id')->whereActive(true)->where('to_catalog', true)->orderBy('ordering','asc')
                ->with(['gallery','childCategories.childCategories.childCategories' => function ($query) {
                    $query->withCount('products');
                }, 'childCategories.products'])
                ->get();
        $this->frontCategoriesFooter =  Category::whereNull('category_id')->whereActive(true)->orderBy('ordering','asc')
            ->with(['footerCategories.footerCategories.footerCategories' => function ($query) {
                $query->withCount('products');
            }, 'footerCategories.products'])
            ->get();
        $this->collections = Brand::whereActive(true)->get();

        $this->information = Information::first();
        foreach ($this->frontCategories as $parentCategory) {
            foreach($parentCategory->childCategories as $category) {
                $category->products_count = $category->childCategories->sum('products_count');
            }
            $parentCategory->products_count = $parentCategory->childCategories->sum('products_count');
        }
//        foreach ($this->frontCategoriesFooter as $parentCategory) {
//            foreach($parentCategory->childCategories as $category) {
//                $category->products_count = $category->childCategories->sum('products_count');
//            }
//            $parentCategory->products_count = $parentCategory->childCategories->sum('products_count');
//        }
    }
}
