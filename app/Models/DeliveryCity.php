<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class DeliveryCity extends Model
{
    use HasFactory,HasTranslations;
    public $table = 'delivery_cities';


    protected $fillable = [
        'title',
        'region_id',
        'price',
    ];
    public $translatable = [
        'title',
    ];

    public function region()
    {
        return $this->belongsTo('App\Models\DeliveryRegion', 'region_id', 'id');
    }
}
