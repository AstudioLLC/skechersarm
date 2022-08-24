<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class QuestionAnswer extends Model
{
    use HasFactory,HasTranslations,SoftDeletes;

    protected $fillable = [
        'question',
        'answer',
        'active',
        'ordering'
    ];

    public $translatable = [
        'question',
        'answer',
    ];
}
