<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PollOption extends Model
{
    use HasFactory,HasTranslations;

    protected $fillable = [
        'title',
        'percent',
        'count',
        'session'
    ];

    public $translatable = [
        'title',
    ];

    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }

    public static function getCount($id)
    {
        return self::class::with('poll')->whereHas('poll',function ($q) use ($id){
            $q->where('poll_id',$id);
        })->sum('count');
    }
}
