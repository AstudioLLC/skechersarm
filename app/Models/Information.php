<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Information extends Model
{
    use HasFactory,HasTranslations, SoftDeletes;
    protected $table = 'information';

    protected $fillable = [
        'address',
        'phone',
        'phone_2',
        'email',
        'map',
        'active',
        'ordering',
        'created_at',
        'updated_at',
    ];

    public $translatable = [
        'address'
    ];
    protected $casts = [
        'deleted_at' => 'datetime',
    ];

}
