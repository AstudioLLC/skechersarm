<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\FastOrder;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Pagination\Paginator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class FastOrderComponent extends Component
{
    use WithPagination,LivewireAlert,AuthorizesRoleOrPermission;

    public bool $active;

    public $name = 'Quick Orders', $currentPage = 1, $searchTerm,  $ordering;

    public function mount()
    {
        $this->authorizeRoleOrPermission('order-list');

    }

    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            FastOrder::find($item['value'])->update(['ordering' => $item['order']]);
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
        FastOrder::find($id)->delete();
        $this->alert('error', 'Fast Order Deleted Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);
    }
    public function render()
    {
        $query = '%'.$this->searchTerm.'%';

        $new = FastOrder::whereSeen(false)->count();
        if ($new){
            $items = FastOrder::with('user')->whereSeen(false)->orderBy('ordering','asc')->where(function($sub_query){
                $sub_query->where('name', 'like', '%'.$this->searchTerm.'%');
            })->paginate(10);
        }else{
            $items = FastOrder::with('user')->orderBy('ordering','asc')->where(function($sub_query){
                $sub_query->where('name', 'like', '%'.$this->searchTerm.'%');
            })->paginate(10);
        }
        FastOrder::whereSeen(false)->update(['seen' => true]);
        $statuses = ['sent','canceled','success'];

        return view('livewire.admin.orders.fast-order-component',compact('items','statuses'))->extends('layouts.admin');
    }
}
