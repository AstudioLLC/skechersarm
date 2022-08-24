<?php

namespace App\Http\Livewire\Admin\DeliveryRegions;


use App\Models\DeliveryCity;
use App\Models\DeliveryRegion;
use Illuminate\Pagination\Paginator;
use Livewire\Component;

class DeliveryRegionComponent extends Component
{


    public bool $active;
    public $trashed = false;

    public $name = 'Region', $currentPage = 1, $searchTerm;

    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            DeliveryRegion::find($item['value'])->update(['ordering' => $item['order']]);
        }
    }

    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }
    public function delete($id)
    {
        DeliveryRegion::find($id)->delete();
        $this->alert('error', 'Region Deleted Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);

    }

    public function render()
    {
        $items = DeliveryRegion::orderBy('id','asc')->where(function($sub_query){
            $sub_query->where('title', 'like', '%'.$this->searchTerm.'%');
        })->with('cities')->paginate(10);
        return view('livewire.admin.delivery-regions.delivery-region-component', compact('items'))->extends('layouts.admin');
    }
}
