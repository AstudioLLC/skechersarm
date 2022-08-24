<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusCard extends Model
{
    use HasFactory;

    public $table = 'user_bonus_card';

    protected $fillable = [
        'user_id',
        'card_code',
        'name',
        'surname' ,
        'status' ,
    ];

    public static function getUserBonusCard($id)
    {
        return self::select('user_id', 'card_code', 'name', 'surname', 'created_at')->where(['user_id' => $id])->get();

    }


}
