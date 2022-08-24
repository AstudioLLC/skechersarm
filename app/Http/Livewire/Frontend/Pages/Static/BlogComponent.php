<?php

namespace App\Http\Livewire\Frontend\Pages\Static;

use App\Models\Blog;
use Livewire\Component;

class BlogComponent extends Component
{
    public function render()
    {
        $items = Blog::whereActive(true)->orderBy('created_at')->get();

        return view('livewire.frontend.pages.static.blog-component',compact('items'))->extends('layouts.base');
    }
}
