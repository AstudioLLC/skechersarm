<?php

namespace App\Models\Traits\Relationships;


use App\Models\Gallery;

trait PageRelationships
{
    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'key')->where('model', 'page')->orderBy('ordering', 'asc');
    }
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('ordering', 'asc');
    }

    public static function seoTitle()
    {
        $page = self::class::whereUrl(request()->segment(count(request()->segments())))->first();

        if ($page){
            return $page->seo_title ?? $page->name;
        }
        return null;
    }
    public static function seoDescription()
    {
        $page = self::class::whereUrl(request()->segment(count(request()->segments())))->first();
        if ($page){
            return $page->seo_description;
        }
        return null;
    }
    public static function seoKeywords()
    {
        $page = self::class::whereUrl(request()->segment(count(request()->segments())))->first();
        if ($page){
            return $page->seo_keywords;
        }
        return null;
    }



}
