<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, SoftDeletes,HasTranslations;

    public $table = 'categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'slug',
        'image',
        'image_url',
        'image_second',
        'image_second_url',
        'to_footer',
        'to_catalog',
        'created_at',
        'ordering',
        'updated_at',
        'deleted_at',
    ];

    public $translatable = [
        'name',
        'description',
    ];

    public static function homeCategories()
    {
        return self::class::whereNull('category_id')->whereToHome(true)->orderBy('created_at','DESC')->limit(4)->get();
    }
    public static function availables()
    {
        return self::class::whereHas('childCategories',function ($q){
            $q->with('childCategories');
        })->with('parentCategory')->get();
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');

    }

    public function childCategories()
    {
        return $this->hasMany(Category::class, 'category_id')->whereActive(true)->where('to_catalog', true)->orderBy('ordering','asc');

    }
    public function footerCategories()
    {
        return $this->hasMany(Category::class, 'category_id')->whereActive(true)->where('to_footer', true)->limit(7)->orderBy('ordering','asc');

    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function filters()
    {
        return $this->belongsToMany(Filter::class,'filter_category');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'key')->where('model', 'category')->orderBy('ordering', 'asc');
    }
    public static function seoTitle()
    {
        $category = self::class::whereSlug(request()->segment(count(request()->segments())))->first();
        if ($category){
            return $category->seo_title ?? $category->name;
        }
        return null;
    }
    public static function seoDescription()
    {
        $category = self::class::whereSlug(request()->segment(count(request()->segments())))->first();
        if ($category){
            return $category->seo_description;
        }
        return null;
    }
    public static function seoKeywords()
    {
        $category = self::class::whereSlug(request()->segment(count(request()->segments())))->first();
        if ($category){
            return $category->seo_keywords;
        }
        return null;
    }
}
