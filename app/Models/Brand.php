<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Brand extends Model
{
    use HasFactory,SoftDeletes,HasTranslations;

    protected $fillable = [
        'title',
        'content',
        'url',
        'active',
        'image',
        'ordering'
    ];

    public $translatable = [
        'title',
        'content',
    ];

    public static function menuBrands()
    {
        return self::class::whereToMenu(true)->get();
    }
    public static function homeBrands()
    {
        return self::class::whereToHome(true)->get();
    }
}
