<?php

namespace App\Http\Livewire\Admin\Information;

use App\Models\Information;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class InformationComponent extends Component
{
    use LivewireAlert, WithPagination;

    public bool $active;

    public $name = 'Information', $currentPage = 1, $searchTerm,  $ordering;

    public $address;
    public $phone;
    public $phone_2;
    public $email;
    public $map;


    public function delete($id)
    {
        Information::find($id)->delete();
        $this->alert('warning', 'Information Deleted Successfully');

    }


    public function render()
    {

//        $query = '%'.$this->searchTerm.'%';
        $items = Information::get();
        return view('livewire.admin.information.information-component',compact('items'))->extends('layouts.admin');
    }
}
