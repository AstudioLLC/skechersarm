<?php

namespace App\Http\Livewire\Frontend\Blocks\Home;

use App\Models\Product;
use Livewire\Component;

class HeaderSearchComponent extends Component
{
    public $query;
    public $searchProducts;
    public $highlightIndex;

    public function mount()
    {
        $this->resetSearch();
    }

    public function resetSearch()
    {
        $this->query = '';
        $this->searchProducts = [];
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->searchProducts) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->searchProducts) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectProduct()
    {
        $product = $this->searchProducts[$this->highlightIndex] ?? null;
        if ($product) {
            $this->redirect(route('product', $product['slug']));
        }
    }

    public function updatedQuery()
    {
        $this->searchProducts = Product::where('name', 'like', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.frontend.blocks.home.header-search-component');
    }
}
