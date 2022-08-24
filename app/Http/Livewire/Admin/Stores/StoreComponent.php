<?php

namespace App\Http\Livewire\Admin\Stores;

use App\Models\Store;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Pagination\Paginator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class StoreComponent extends Component
{
    use LivewireAlert, WithPagination,AuthorizesRoleOrPermission;

    public bool $active;

    public $name = 'Stores', $currentPage = 1, $searchTerm,  $ordering;

    public $title;
    public $location;
    public $email;
    public $telephone;
    public $sec_telephone;
    public $description;

    public function mount()
    {
        $this->authorizeRoleOrPermission('store-list');

    }

    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            Store::find($item['value'])->update(['ordering' => $item['order']]);
        }
    }


    public function delete($id)
    {
        Store::find($id)->delete();
        $this->alert('warning', 'Store Deleted Successfully');

    }

    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->location = '';
        $this->email = '';
        $this->telephone = '';
        $this->sec_telephone = '';
        $this->description = '';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'location' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'sec_telephone' => 'nullable',
            'description' => 'nullable',

        ]);
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'location' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'sec_telephone' => 'nullable',
            'description' => 'nullable',
        ]);
        $store = new Store();
        $store->title =$this->title;
        $store->location =$this->location;
        $store->email =$this->email;
        $store->telephone =$this->telephone;
        $store->sec_telephone =$this->sec_telephone;
        $store->description =$this->description;


        $store->save();
        $this->resetInputFields();
        $this->alert('success', 'Store has been created successfully');
    }
    public function render()
    {
        $query = '%'.$this->searchTerm.'%';
        $items = Store::orderBy('ordering','asc')->where(function($sub_query){
            $sub_query->where('title', 'like', '%'.$this->searchTerm.'%');
        })->paginate(10);
        return view('livewire.admin.stores.store-component',compact('items'))->extends('layouts.admin');
    }
}
