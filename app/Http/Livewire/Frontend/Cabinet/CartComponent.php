<?php

namespace App\Http\Livewire\Frontend\Cabinet;

use App\Models\DeliveryCity;
use App\Models\DeliveryRegion;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Store;
use App\Traits\Arca;
use App\Traits\Basket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    use Basket,LivewireAlert,Arca;

    public $city;
    public $region;
    public $regions;
    public $deliveryprice;


    public function mount()
    {
        $this->region = collect();
        $this->regions = collect();

    }
    public function updatedCity($city)
    {
        if (!is_null($city)) {

            $this->region = DeliveryCity::where('region_id',$city)->get();
        }
    }
    public function updatedRegions($region,$city)
    {
        if (!is_null($region) && !is_null($city)) {

            $this->regions = DeliveryCity::where('id',$region)->first();
            $this->deliveryprice = $this->regions->price;
        }
            $del= DeliveryCity::where('id',$this->regions)->first();
        if($del){
            $price = $del->price;
            $this->deliveryprice = $price;
        }

    }

    public function render()
    {

        $storeAddresses = Store::get();
        $delivery = DeliveryRegion::with('cities')->get();

        return view('livewire.frontend.cabinet.cart-component',compact('storeAddresses','delivery'))->extends('layouts.base');
    }
}
