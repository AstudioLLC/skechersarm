<?php

namespace App\Http\Livewire\Frontend\Cabinet;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OngoingPurchases extends Component
{
    public function render()
    {
        $items = Order::whereUserId(Auth::id())
                            ->whereStatus('sent')
                                ->orWhere('status','shipping')
                                    ->orWhere('status','approved')
                                        ->orWhere('status','pending')
                                            ->whereHas('orderItems',function ($check){
                                                    $check->whereNull('fast_order_id');
                        })->with('orderItems.product')->orderBy('created_at','desc')->get();

        return view('livewire.frontend.cabinet.ongoing-purchases',compact('items'))->extends('layouts.base');
    }
}
