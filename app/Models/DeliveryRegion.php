<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class DeliveryRegion extends Model
{
    use HasFactory,HasTranslations;
    public $table = 'delivery_regions';

    protected $fillable = [
        'title',
    ];
    public $translatable = [
        'title',
    ];

    public function cities()
    {
        return $this->hasMany(DeliveryCity::class, 'region_id', 'id');
    }
}
