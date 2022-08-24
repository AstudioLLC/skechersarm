<?php

namespace App\Http\Livewire\Frontend\Includes;

use App\Traits\frontCategories;
use Livewire\Component;

class FooterComponent extends Component
{
    use frontCategories;
    public $pagesForInformation;
    public $pagesForBuyers;
    public $headerPages;
    public $information;

    public function render()
    {
        return view('livewire.frontend.includes.footer-component');
    }
}
