<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Filter extends Model
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

    public function criteries()
    {
        return $this->hasMany(Criteria::class);
    }


}
