<?php

namespace App\Http\Livewire\Frontend\Blocks\Home;

use Livewire\Component;

class BlogComponent extends Component
{
    public $items;

    public function render()
    {
        return view('livewire.frontend.blocks.home.blog-component');
    }
}
