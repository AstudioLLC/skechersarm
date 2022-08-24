<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class SocialNetwork extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'social_networks';

    protected $fillable = [
        'id',
        'title',
        'image',
        'url',
        'active',
        'ordering',
        'created_at',
        'updated_at',
        'deleted_at'
    ];



    protected $casts = [
        'deleted_at' => 'datetime',
    ];
}
