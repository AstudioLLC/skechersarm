<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slide extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $table = 'slides';

    protected $fillable = [
        'id',
        'title',
        'image',
        'url',
        'description',
        'active',
        'ordering',
        'button',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $translatable = [
        'title',
        'description',
        'button'
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

}
