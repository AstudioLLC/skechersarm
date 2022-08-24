<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobRequest extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'surname',
        'phone',
        'email',
        'file',
        'active',
        'ordering'
    ];



    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
