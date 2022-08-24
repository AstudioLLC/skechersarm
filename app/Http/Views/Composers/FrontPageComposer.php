<?php

namespace App\Http\Views\Composers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Information;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FrontPageComposer
{
    private $pagesForBuyers;
    private $pagesForInformation;
    private $information;
    private $headerPages;
    private $seoTitle;
    private $seoDescription;
    private $seoKeywords;

    private $currentPage;

    public function __construct()
    {
        $this->pagesForBuyers = Cache::remember('pagesForBuyers', 3500, function () {
            return Page::forBuyers();
        });

//        $this->pagesForInformation = Cache::remember('pagesForInformation', 3500, function () {
//            return Page::forInformation();
//        });
        $this->headerPages = Page::headerPages();
        $this->information = Information::first();
        $this->pagesForInformation = Page::forInformation();
        $this->currentPage = Page::currentPage();
        $this->seoTitle = Page::seoTitle() ?? Product::seoTitle() ?? Category::seoTitle() ?? Blog::seoTitle();
        $this->seoDescription = Page::seoDescription() ?? Product::seoDescription() ?? Category::seoDescription() ?? Blog::seoDescription();
        $this->seoKeywords = Page::seoKeywords() ?? Product::seoKeywords() ?? Category::seoKeywords() ?? Blog::seoKeywords();
    }

    public function compose(View $view)
    {
        $view->with([
                     'information'=>$this->information,
                     'pagesForBuyers'=>$this->pagesForBuyers,
                     'pagesForInformation'=>$this->pagesForInformation,
                     'currentPage' => $this->currentPage,
                     'headerPages' => $this->headerPages,
                     'seoTitle' => $this->seoTitle,
                     'seoDescription' => $this->seoDescription,
                     'seoKeywords' => $this->seoKeywords
        ]);
    }
}
