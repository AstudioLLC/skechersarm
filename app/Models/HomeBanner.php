<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HomeBanner extends Model
{
    use HasFactory,HasTranslations;

    protected $fillable = [
      'section',
      'image',
      'url',
      'title',
      'button'
    ];

    public $translatable = [
        'title',
        'button'
    ];
}
