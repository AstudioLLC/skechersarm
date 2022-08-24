<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FastOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone',
        'city',
        'district',
        'address',
        'home',
        'apartment',
        'notes',
        'stores',
        'active',
        'ordering',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
