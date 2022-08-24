<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Store extends Model
{
    use HasFactory,SoftDeletes,HasTranslations;

    protected $fillable = [
        'title',
        'location',
        'email',
        'telephone',
        'sec_telephone',
        'description',
        'logo',
        'active',
        'ordering'
    ];

    public $translatable = [
        'title',
        'location',
        'description'
    ];

    public function gallery(){
        return $this->hasMany(Gallery::class,'key')->whereModel('store');
    }
}
