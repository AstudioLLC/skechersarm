<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Career extends Model
{
    use HasFactory,SoftDeletes,HasTranslations;

    protected $fillable = [
        'title',
        'content',
        'schedule',
        'hours',
        'salary',
        'city',
        'description',
        'deadline',
        'active',
        'image',
        'ordering'
    ];

    public $translatable = [
        'title',
        'content',
        'description',
        'schedule',
        'city',
    ];

    public function jobRequests()
    {
        return $this->hasMany(JobRequest::class);
    }
}
