<?php

namespace App\Http\Livewire\Frontend\Blocks\Home;

use App\Models\Brand;
use App\Models\Page;
use App\Traits\frontCategories;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class HeaderCategoryComponent extends Component
{
    use frontCategories;

    public function render()
    {
        $brands = Brand::menuBrands();
//        $headerPages = Cache::remember('headerPages',3600,function (){
//            return Page::headerPages();
//        });
        $headerPages =  Page::headerPages();

        return view('livewire.frontend.blocks.home.header-category-component',compact('brands','headerPages'));
    }
}
