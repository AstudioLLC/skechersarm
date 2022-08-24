<?php

namespace App\Http\Livewire\Frontend\Blocks\Home;

use App\Traits\Basket;
use Livewire\Component;

class HeaderBasketModal extends Component
{
    use Basket;
    protected $listeners = ['refreshComponent'=>'$refresh'];


    public function render()
    {
        return view('livewire.frontend.blocks.home.header-basket-modal');
    }
}
