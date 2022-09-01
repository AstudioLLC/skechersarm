<?php

namespace App\Http\Livewire\Frontend\Cabinet;

use App\Models\BonusCard;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Milon\Barcode\DNS1D;


class BonusCardComponent extends Component
{
use LivewireAlert;

public $name;
public $surname;
public $card_code;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'surname' => 'required',
            'card_code' => 'required|digits:8',
        ],
        [
                'name.required'=> __('auth.bonus.Name required'),
                'surname.required'=> __('auth.bonus.Surname required'),
                'card_code.required'=> __('auth.bonus.Bonus required'),
                'card_code.digits'=> __('auth.bonus.Bonus length required'),
        ]);
    }

    public function save(){

        $this->validate([
            'name' => 'required',
            'surname' => 'required',
            'card_code' => 'required|digits:8',
        ],
        [
            'name.required'=> __('auth.bonus.Name required'),
            'surname.required'=> __('auth.bonus.Surname required'),
            'card_code.required'=> __('auth.bonus.Bonus required'),
            'card_code.digits'=> __('auth.bonus.Bonus length required'),
        ]);
        $bonus = new BonusCard();
        $bonus->name = $this->name;
        $bonus->surname = $this->surname;
        $bonus->card_code = $this->card_code;
        $bonus->user_id = Auth::user()->id;

        $bonus->save();

        $this->alert('success', 'Bonus has been created Successfully');
        return redirect()->route('cabinet.bonus-card');
    }




    public function render()
    {

        if (auth()->user()) {
            $asd = BonusCard::getUserBonusCard(auth()->user()->id)->count();
        }
        $showAddCard = isset($asd) ? $asd : false;
        $code = BonusCard::where('user_id',(auth()->user()->id))->first();
        $bon_code = null;
        if ($code && $code->status == 1){
            $productCode = $code->card_code;
            $bon_code =  DNS1D::getBarcodeHTML("$productCode", 'C128');
        }



        return view('livewire.frontend.cabinet.bonus-card-component', compact('showAddCard','code', 'bon_code'))->extends('layouts.base');
    }
}
