<?php

namespace App\Http\Livewire\Frontend\Pages;

use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\HomeBanner;
use App\Models\Product;
use App\Models\Slide;
use App\Traits\Basket;
use Livewire\Component;

class HomeComponent extends Component
{
use Basket;
    public function render()
    {
        $headerSlides = Slide::whereActive(true)->get();
        $discountedProducts = Product::saleProducts();
        $newProducts = Product::newProducts();
        $blogs = Blog::homeBlogs();
        $topSellers = Product::topSellerHomeProducts();
        $homeCategories = Category::homeCategories();
        $newsBanner = HomeBanner::whereSection('news')->limit(3)->get();
        $newsBanner2 = HomeBanner::whereSection('news2')->limit(3)->get();
        $discountsBanner = HomeBanner::whereSection('discounts')->limit(3)->get();
        $brands = Brand::whereActive(true)->get();
        return view('livewire.frontend.pages.home-component',compact(
            'discountedProducts',
            'newProducts',
                    'headerSlides',
                    'blogs',
                    'newsBanner',
                    'newsBanner2',
                    'topSellers',
                    'homeCategories',
                    'discountsBanner',
                    'brands'
        ))->extends('layouts.base');
    }
}
