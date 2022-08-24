<?php

namespace App\Http\Livewire\Admin\Bonus;


use App\Models\BonusCard;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads,LivewireAlert,AuthorizesRoleOrPermission;


    public $status;
    public $bonus_id;
    public $saved = false;

    public function mount($id)
    {
//        $this->authorizeRoleOrPermission('bonus-edit');
        $bonus = BonusCard::where('id',$id)->first();
        $this->status = $bonus->status;
        $this->bonus_id = $id;


    }

    public function updateStatus1()
    {
        $bonus = BonusCard::find($this->bonus_id);
        $bonus->status = 1;

        $bonus->save();
        $this->alert('success', 'Bonus been changed successfully');
        $this->saved = true;
    }
    public function updateStatus(){
        $bonus = BonusCard::find($this->bonus_id);
        $bonus->status = 2;

        $bonus->save();
        $this->alert('success', 'Bonus been changed successfully');
        $this->saved = true;
    }


    public function render()
    {
        $item = BonusCard::where('id', $this->bonus_id)->first();

        return view('livewire.admin.bonus.edit',compact('item'))->extends('layouts.admin');
    }
}
