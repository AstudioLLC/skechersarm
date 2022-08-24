<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Criteria extends Model
{
    use HasFactory,HasTranslations;

    protected $fillable = [
        'title',
        'active',
        'ordering'
    ];

    public $translatable = [
        'title'
    ];

    public function filter()
    {
        return $this->belongsTo(Filter::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_criteria');
    }
}
