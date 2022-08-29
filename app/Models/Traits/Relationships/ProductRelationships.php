<?php

namespace App\Models\Traits\Relationships;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Criteria;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

trait ProductRelationships
{
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function sellers()
    {
        return $this->belongsToMany(User::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'key')->where('model', 'product')->orderBy('ordering', 'asc');
    }

    public static function discountedProducts()
    {
        return self::class::whereNotNull('sale_price')->whereActive(true)->get();
    }
    public static function saleProducts()
    {
        return self::class::where('other', 1)->whereActive(true)->with('categories.parentCategory.parentCategory')->get();
    }

    public static function newProducts()
    {
        return self::class::orderBy('created_at')->whereActive(true)->with('categories.parentCategory.parentCategory')->limit(5)->get();
    }

    public static function topSellerHomeProducts()
    {
        return self::class::orderBy('sold')->whereActive(true)->limit(5)->get();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id')->whereValidated(true);
    }
    public static function offeredProducts()
    {
        return self::class::whereOffered(true)->whereActive(true)->get();
    }

    public function criteries()
    {
        return $this->belongsToMany(Criteria::class,'product_criteria');
    }
    public static function sizeCriteries($id)
    {
        return Criteria::with('filter')->whereHas('filter',function($q){
            $q->whereStatic('size');
        })->whereHas('products',function ($e) use ($id){
            $e->whereProductId($id);
        })->get();
    }
    public static function colors($article,$barcode)
    {
        return self::class::whereIn('article_1c',[$article])->whereNot('barcode',$barcode)->get();
    }

    public static function availableSizeCriteries($id)
    {
        return Criteria::with('filter')->whereHas('filter',function($q){
            $q->whereStatic('size');
        })->whereHas('products',function ($e) use ($id){
            $e->whereProductId($id);
            $e->where('count','>',0);
        })->pluck('id')->toArray();
    }
    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brand_id');
    }

    public static function seoTitle()
    {
        $product = self::class::whereSlug(request()->segment(count(request()->segments())))->first();
        if ($product){
            return $product->seo_title ?? $product->name;
        }
        return null;
    }
    public static function seoDescription()
    {
        $product = self::class::whereSlug(request()->segment(count(request()->segments())))->first();
        if ($product){
            return $product->seo_description;
        }
        return null;
    }
    public static function seoKeywords()
    {
        $product = self::class::whereSlug(request()->segment(count(request()->segments())))->first();
        if ($product){
            return $product->seo_keywords;
        }
        return null;
    }
    public static function getSizesBarcodes($product_id)
    {
        $product = Product::whereId($product_id)->first();
        return $product->criteries()->pluck('barcode')->toArray();
    }
    public static function hasSizes($product_id)
    {
        return DB::table('product_criteria')->where('product_id',$product_id)->count();
    }




}
