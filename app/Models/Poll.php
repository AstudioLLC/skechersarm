<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Poll extends AbstractModel
{
    use HasFactory,HasTranslations,SoftDeletes;
    public static $imagePath = '/polls';

    protected $fillable = [
        'title',
        'image',
        'active',
        'ordering'
    ];

    public $translatable = [
        'title',
    ];

    public function options()
    {
        return $this->hasMany(PollOption::class);
    }
}
