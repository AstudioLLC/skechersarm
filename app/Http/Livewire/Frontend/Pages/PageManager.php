<?php

namespace App\Http\Livewire\Frontend\Pages;

use App\Models\About;
use App\Models\Blog;
use App\Models\Career;
use App\Models\Information;
use App\Models\Page;
use App\Models\Product;
use App\Models\QuestionAnswer;
use App\Models\Slide;
use App\Models\SocialNetwork;
use App\Models\Store;
use App\Traits\StaticPages;
use Livewire\Component;

class PageManager extends Component
{
    use StaticPages;

    public $page;
    public $item;

    public function render()
    {

        if ($this->static == 'about-us')
        {
            $this->page = Page::where('static','about-us')->first();
            $this->item = About::where('id',1)->firstOrFail();

            return view('livewire.frontend.pages.static.about-us-component')->extends('layouts.base');
        }
//        elseif ($this->static == 'contacts'){
//
//            $this->page = Page::where('static','contacts')->first();
//
//            return view('livewire.frontend.pages.static.contact-component')->extends('layouts.base');
//        }
        elseif ($this->static == 'shipment'){
            $this->page = Page::where('static','shipment')->first();
            return view('livewire.frontend.pages.static.delivery-component')->extends('layouts.base');
        }
//        elseif ($this->static == 'collection'){
//            $this->page = Page::where('static','collection')->first();
//            return view('livewire.frontend.pages.static.collection-component')->extends('layouts.base');
//        }
        elseif ($this->static == 'shops'){
            $this->page = Page::where('static','shops')->first();
            $items = Store::with('gallery')->orderBy('ordering')->get();
            return view('livewire.frontend.pages.static.stores-component',compact('items'))->extends('layouts.base');
        }
        elseif($this->static == 'blogs'){

            $this->page = Page::where('static','blogs')->first();
            $items = Blog::whereActive(true)->get();
            return view('livewire.frontend.pages.static.blog-component',compact('items'))->extends('layouts.base');
        }
        elseif($this->static == 'frequently-asked-questions'){

            $this->page = Page::where('static','frequently-asked-questions')->first();
            $items = QuestionAnswer::get();
            return view('livewire.frontend.pages.static.frequently-asked-questions-component',compact('items'))->extends('layouts.base');
        }
        elseif($this->static == 'vacancies'){

            $this->page = Page::where('static','vacancies')->first();
            $items = Career::whereActive(true)->get();
            return view('livewire.frontend.pages.static.vacancies-component',compact('items'))->extends('layouts.base');
        }
        return view('livewire.frontend.pages.page-manager')->extends('layouts.base');
    }
}
