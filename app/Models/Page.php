<?php

namespace App\Models;

use App\Helpers\PageRouteService;
use App\Models\Traits\Relationships\PageRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, HasTranslations, SoftDeletes,PageRelationships;

    protected $table = 'pages';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'parent_id',
        'url',
        'title',
        'icon',
        'image',
        'show_image',
        'to_top',
        'to_menu',
        'to_footer',
        'content',
        'title_content',
        'sec_content',
        'active',
        'ordering',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    public $translatable = [
        'title',
        'content',
        'title_content',
        'sec_content',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public static function forBuyers()
    {
        return self::class::whereBuyers(true)->whereActive(true)->select('id','url','title')->orderBy('ordering','asc')->get();
    }

    public static function forInformation()
    {
        return self::class::whereAbout(true)->whereActive(true)->whereToFooter(true)->select('id','url','title')->orderBy('ordering','asc')->get();
    }

    public static function currentPage()
    {
        return self::class::where('url',request()->segment(count(request()->segments())))->first();
    }
    public static function headerPages()
    {
        return self::class::whereToTop(true)->orderBy('ordering')->get();
    }

    public function childpages()
    {
        return $this->hasMany(Page::class, 'parent_id')->orderBy('ordering','asc');

    }
    public function parentPages()
    {
        return $this->belongsTo(Page::class, 'parent_id');

    }
    public static function availables()
    {
        return self::class::whereHas('childpages',function ($q){
            $q->with('childpages');
        })->with('parentPages')->get();
    }


    public function getRouteAttribute()
    {
        $categoryRouteService = app(PageRouteService::class);

        return $categoryRouteService->getRoute($this);
    }
}
