<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\FastOrder;
use App\Models\Order;
use App\Traits\AuthorizesRoleOrPermission;
use Livewire\Component;

class Show extends Component
{
    use AuthorizesRoleOrPermission;

    public $order_id;

    public function mount($order_id)
    {
        $this->authorizeRoleOrPermission('order-list');
        $this->order_id = $order_id;
    }
    public function render()
    {
        $last = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();

        if ($last == 'admin.fast.orders'){
            $order = FastOrder::with('orderItems.product')->find($this->order_id);
        }elseif ($last == 'admin.orders'){
            $order = Order::with('orderItems.product')->find($this->order_id);
        }
        return view('livewire.admin.orders.show',compact('order'))->extends('layouts.admin');
    }
}
