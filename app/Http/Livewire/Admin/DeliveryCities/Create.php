<?php

namespace App\Http\Livewire\Admin\DeliveryCities;

use App\Models\DeliveryCity;
use App\Models\DeliveryRegion;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads,LivewireAlert;

    public $title;
    public $price;
    public $region_id;

    public function mount($id)
    {
        $this->region_id = $id;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'price' => 'required',
        ]);
    }

    public function updateCity()
    {
        $this->validate([
            'title' => 'required',
            'price' => 'required',

        ]);
        $city = new DeliveryCity();
        $city->title = $this->title;
        $city->price = $this->price;
        $city->region_id = 1;

        $city->save();
        $this->alert('success', 'Region been changed successfully');
        $this->saved = true;
        return redirect()->to('management/delivery-cities/'.$this->region_id);
    }

    public function render()
    {
        return view('livewire.admin.delivery-cities.create')->extends('layouts.admin');
    }
}
