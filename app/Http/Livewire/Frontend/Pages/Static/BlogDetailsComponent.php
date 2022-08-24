<?php

namespace App\Http\Livewire\Frontend\Pages\Static;

use App\Models\Blog;
use Livewire\Component;

class BlogDetailsComponent extends Component
{
    public $url;
    public $item;

    public function mount($url)
    {
        $this->url = $url;
        $this->item = Blog::where('url',$url)->first();
    }
    public function render()
    {
        return view('livewire.frontend.pages.static.blog-details-component')->extends('layouts.base');
    }
}
