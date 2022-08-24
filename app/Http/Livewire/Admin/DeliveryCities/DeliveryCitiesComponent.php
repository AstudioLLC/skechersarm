<?php

namespace App\Http\Livewire\Admin\DeliveryCities;


use App\Models\DeliveryCity;
use App\Models\DeliveryRegion;
use Illuminate\Pagination\Paginator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class DeliveryCitiesComponent extends Component
{
    use WithFileUploads, LivewireAlert, WithPagination;

    public bool $active;
    public $trashed = false;
    public $item_id;

    public $name = 'Cities', $currentPage = 1, $searchTerm;


    public function mount($id)
    {

        $this->item_id = $id;
    }

    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            DeliveryCity::find($item['value'])->update(['ordering' => $item['order']]);
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
        DeliveryCity::find($id)->delete();
        $this->alert('error', 'City Deleted Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);

    }

    public function render()
    {

        $items = DeliveryCity::orderBy('id','asc')->where(function($sub_query){
            $sub_query->where('title', 'like', '%'.$this->searchTerm.'%');
        })->where('region_id',$this->item_id)->paginate(10);
        return view('livewire.admin.delivery-cities.delivery-cities-component',compact('items'))->extends('layouts.admin');
    }
}
