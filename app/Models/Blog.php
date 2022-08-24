<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory,HasTranslations;

    protected $fillable = [
        'title',
        'url' ,
        'short' ,
        'description' ,
        'image' ,
        'sec_image' ,
        'seo_title',
        'seo_description',
        'seo_keywords',
        'active' ,
        'ordering',
    ];

    public $translatable = [
        'title',
        'short' ,
        'description',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
        'title' => 'array',
        'short' => 'array',
        'description',
    ];

    public static function homeBlogs()
    {
        return self::class::whereToHome(true)->whereActive(true)->limit(4)->get();
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'key')->where('model', 'blog')->orderBy('ordering', 'asc');
    }
    public static function seoTitle()
    {
        $blog = self::class::whereUrl(request()->segment(count(request()->segments())))->first();
        if ($blog){
            return $blog->seo_title ?? $blog->title;
        }
        return null;
    }
    public static function seoDescription()
    {
        $blog = self::class::whereUrl(request()->segment(count(request()->segments())))->first();
        if ($blog){
            return $blog->seo_description;
        }
        return null;
    }
    public static function seoKeywords()
    {
        $blog = self::class::whereUrl(request()->segment(count(request()->segments())))->first();
        if ($blog){
            return $blog->seo_keywords;
        }
        return null;
    }
}
