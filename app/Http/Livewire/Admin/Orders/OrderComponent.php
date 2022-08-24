<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Pagination\Paginator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class OrderComponent extends Component
{
    use WithPagination,LivewireAlert,AuthorizesRoleOrPermission;

    protected $listeners = ['updatedStatus' => '$refresh'];
    public bool $active;

    public $name = 'Orders', $currentPage = 1, $searchTerm,  $ordering,$status;
    public $start_date;
    public $end_date;
    public $dataOrder;
    public $itemss;
    public function mount()
    {
        $this->authorizeRoleOrPermission('order-list');

    }

    public function updateOrderStatus($order_id,$status)
    {

        $ord = Order::find($order_id);
        $ord->status = $status;
        $ord->save();
        $this->emitTo(self::class,'updatedStatus');

    }

    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            Order::find($item['value'])->update(['ordering' => $item['order']]);
        }
    }

    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }

    public function searchOrder(){
//        $items = Order::with('user')->orderBy('created_at','Desc')->where(function($sub_query){
//            $sub_query->where('status', 'like', '%'.$this->searchTerm.'%');
//        })->paginate(100);
        $items = Order::whereBetween('created_at', array($this->start_date, $this->end_date))->get();


    }

    public function render()
    {
        $query = '%'.$this->searchTerm.'%';

        $items = Order::with('user')->orderBy('created_at','Desc')->where(function($sub_query){
            $sub_query->where('status', 'like', '%'.$this->searchTerm.'%');
            if ($this->start_date){
                $sub_query->whereBetween('created_at', array($this->start_date, $this->end_date));
            }

        })->paginate(100);
        $statuses = ['sent','approved','canceled','pending','shipping','finished'];
        Order::whereSeen(false)->update(['seen' => true]);


        return view('livewire.admin.orders.order-component',compact('items','statuses'))->extends('layouts.admin');
    }
}
