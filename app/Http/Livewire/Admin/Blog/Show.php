<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog;
use Livewire\Component;

class Show extends Component
{
    public $blog;

    public function mount($url)
    {
        $this->blog = Blog::where('url', $url)->first();
    }
    public function render()
    {
        return view('livewire.admin.blog.show')->extends('layouts.admin');
    }
}
