<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone',
        'index',
        'country',
        'city',
        'address',
        'district',
        'passport',
        'arm_storage',
        'usa_storage',
        'gender',
        'street',
        'region',
        'date_birthday',
        'orders_count',
        'home',
        'house',
        'discount_card',
        'registered_phone',
        'password',
        'is_admin',
        'last_activity',
        'google_id',
        'fb_id',
        'twitter_id',
        'banned_until',
        'is_email_verified',
        'ordering',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $dates = [
        'banned_until'
    ];


    public function message()
    {
        return $this->hasMany(Message::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
