<?php

namespace App\Http\Livewire\Admin\DeliveryRegions;


use App\Models\DeliveryRegion;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads,LivewireAlert;


    public $title;
    public $region_id;

    public $saved = false;

    public function mount($url)
    {
        $region = DeliveryRegion::where('id',$url)->first();
        $this->title = $region->getTranslations('title');
        $this->region_id = $region->id;
    }


    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',

        ]);
    }

    public function updateRegion()
    {
        $this->validate([
            'title' => 'required',

        ]);
        $region = DeliveryRegion::find($this->region_id);
        $region->title = $this->title;


        $region->save();
        $this->alert('success', 'Region been changed successfully');
        $this->saved = true;
    }

    public function render()
    {
        return view('livewire.admin.delivery-regions.edit')->extends('layouts.admin');
    }
}
