<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasFactory,HasTranslations;

    protected $fillable = [
      'title',
      'content',
      'image'
    ];

    public $translatable = [
        'title',
        'content',
    ];
}
