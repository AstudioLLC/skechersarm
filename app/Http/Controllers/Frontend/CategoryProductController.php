<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryProductController extends Controller
{
    public function category(Category $category, Category $childCategory = null,  $childCategory2 = null, $lastCategory = null)
    {
        $products = null;
        $ids = collect();
        $selectedCategories = [];
        if ($lastCategory){
            $test = Category::whereSlug($childCategory2)->first();
            $lCategory = $test->childCategories()->where('slug', $lastCategory)->firstOrFail();
            $ids = collect($lCategory->id);
            $selectedCategories = [$category->id, $childCategory->id,$test->id, $lCategory->id];
        }elseif ($childCategory2) {

            $subCategory = $childCategory->childCategories()->where('slug', $childCategory2)->firstOrFail();
            $ids = collect($subCategory->id);
            $selectedCategories = [$category->id, $childCategory->id, $subCategory->id];
        } elseif ($childCategory) {
            $childCategory->load('childCategories.childCategories');
            $ids = $childCategory->childCategories->pluck('id');

            $selectedCategories = [$category->id, $childCategory->id];

        } elseif ($category) {

            $category->load('childCategories.childCategories.childCategories');
            $ids = collect();
            $selectedCategories[] = $category->id;


//            if ($childCategory2) {
//                $subCategory = $childCategory->childCategories()->where('slug', $childCategory2)->firstOrFail();
//                $ids = collect($subCategory->id);
//                $selectedCategories = [$category->id, $childCategory->id, $subCategory->id];
//            } elseif ($childCategory) {
//                $ids = $childCategory->childCategories->pluck('id');
//                $selectedCategories = [$category->id, $childCategory->id];
//            } elseif ($category) {
//                $category->load('childCategories.childCategories');
//                $ids = collect();
//                $selectedCategories[] = $category->id;



            foreach ($category->childCategories as $subCategory) {
                $ids = $ids->merge($subCategory->childCategories->pluck('id'));
                foreach ($subCategory->childCategories as $lastCategory)
                {

                    $ids = $ids->merge($lastCategory->childCategories->pluck('id'));
                }
            }
        }

        $products = Product::whereHas('categories', function ($query) use ($ids) {
            $query->whereIn('id', $ids);
        })->with('categories.parentCategory.parentCategory')
            ->pluck('id');




        return view('index', compact('products', 'selectedCategories'));
    }

    public function product($slug)
    {
        $product = Product::where('slug',$slug)->firstOrFail();
//        $childCategory2 = $product->categories->where('slug', $childCategory2)->first();
//        $selectedCategories = [];
//
//        if ($childCategory2 &&
//            $childCategory2->parentCategory &&
//            $childCategory2->parentCategory->parentCategory
//        ) {
//            $selectedCategories = [
//                $childCategory2->parentCategory->parentCategory->id ?? null,
//                $childCategory2->parentCategory->id ?? null,
//                $childCategory2->id
//            ];
//        }

        return view('product', compact('product'));
    }
}
