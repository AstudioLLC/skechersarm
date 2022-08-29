<?php

namespace App\Models;

use App\Models\Traits\Relationships\ProductRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, SoftDeletes,HasTranslations,ProductRelationships;

    public $table = 'products';

    public static $imagePath = '/products/thumbnail';


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'price',
        'slug',
        'active',
        'is_new',
        'top_seller',
        'offered',
        'is_collection',
        'ordering',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $translatable = [
        'name',
        'description',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];


    public function getImageThumbnail($image = null)
    {
        if ($image) {
            $imageName = $image;
        } else {
            if ($this->image) {
                $imageName = $this->image;
            } else {
                return '';
            }
        }

        $path = static::$imagePath ;

        return asset(sprintf('images%s/%s', $path, $imageName));
    }
}
