<?php

namespace App\Http\Livewire\Admin\DeliveryCities;


use App\Models\DeliveryCity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{


    use WithFileUploads,LivewireAlert;


    public $title;
    public $price;
    public $city_id;

    public $saved = false;

    public function mount($id)
    {
        $city = DeliveryCity::where('id',$id)->first();
        $this->city_id = $id;
        $this->title = $city->getTranslations('title');
        $this->price = $city->price;

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
        $city = DeliveryCity::find($this->city_id);
        $city->title = $this->title;
        $city->price = $this->price;

        $city->save();
//        Artisan::call('cache:clear');
        $this->alert('success', 'City been changed successfully');
        $this->saved = true;

    }
    public function render()
    {
        return view('livewire.admin.delivery-cities.edit')->extends('layouts.admin');
    }
}
