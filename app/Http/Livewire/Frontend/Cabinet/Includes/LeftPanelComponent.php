<?php

namespace App\Http\Livewire\Frontend\Cabinet\Includes;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LeftPanelComponent extends Component
{
    public function render()
    {
        $count_ongoing_purchases = Order::whereUserId(Auth::id())
                            ->whereStatus('sent')
                                ->orWhere('status','shipping')
                                    ->orWhere('status','approved')
                                        ->orWhere('status','pending')
                                            ->whereHas('orderItems',function ($check){
                                                $check->whereNull('fast_order_id');
                                                    })->with('orderItems.product')->count();

        $count_order_archive = Order::whereUserId(Auth::id())
            ->whereStatus('finished')
            ->orWhere('status','canceled')
//            ->orWhere('status','approved')
//            ->orWhere('status','pending')
            ->whereHas('orderItems',function ($check){
                $check->whereNull('fast_order_id');
            })->with('orderItems.product')->count();

        return view('livewire.frontend.cabinet.includes.left-panel-component',compact('count_ongoing_purchases', 'count_order_archive'));
    }
}
