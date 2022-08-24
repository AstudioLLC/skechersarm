<?php

namespace App\Http\Livewire\Admin\DeliveryRegions;

use App\Models\DeliveryRegion;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads,LivewireAlert;

    public $title;

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
        $region = new DeliveryRegion();
        $region->title = $this->title;

        $region->save();
        $this->alert('success', 'Region been changed successfully');
        $this->saved = true;
    }
    public function render()
    {
        return view('livewire.admin.delivery-regions.create')->extends('layouts.admin');
    }
}
