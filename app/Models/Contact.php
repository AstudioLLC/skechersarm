<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'contacts';

    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'message',
        'active',
        'ordering',
        'created_at',
        'updated_at'
    ];
    protected $casts = [
        'deleted_at' => 'datetime',
    ];

}
