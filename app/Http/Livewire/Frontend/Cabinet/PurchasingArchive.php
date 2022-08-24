<?php

namespace App\Http\Livewire\Frontend\Cabinet;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PurchasingArchive extends Component
{
    public function render()
    {
        $items = Order::whereUserId(Auth::id())
                            ->whereStatus('canceled')
                                ->orWhere('status','finished')
                                    ->whereHas('orderItems',function ($check){
                                        $check->whereNull('fast_order_id');
                                            })->with('orderItems.product')->orderBy('created_at','desc')->get();

        return view('livewire.frontend.cabinet.purchasing-archive',compact('items'))->extends('layouts.base');
    }
}
