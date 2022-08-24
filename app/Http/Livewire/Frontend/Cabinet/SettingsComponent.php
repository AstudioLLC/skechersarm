<?php

namespace App\Http\Livewire\Frontend\Cabinet;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingsComponent extends Component
{
    use WithFileUploads,LivewireAlert;
    public $user;
    public $userId;
    public $name;
    public $last_name;
    public $phone;
    public $gender;
    public $discount_card;
    public $city;
    public $address;
    public $date_birthday;
    public $email;
    public $image;
    public $region;
    public $street;
    public $home;
    public $house;
    public $registered_phone;

    public $prevName;
    public $prevlast_Name;
    public $prevPhone;
    public $prevEmail;
    public $prevCity;
    public $prevAddress;
    public $prevGender;
    public $prevDate_birthday;
    public $prevDiscount_card;
    public $prevRegion;
    public $prevStreet;
    public $prevHome;
    public $prevHouse;
    public $prevRegistered_phone;

    protected function rules()
    {
        $params = [
            'name' => '',
            'last_name' => '',
            'phone' => '',
            'email' => 'required|email|unique:users,email,'.$this->userId,
        ];

        return $params;

    }


    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules());
    }
    public function mount()
    {
        $this->user = Auth::user();
        $this->userId = auth()->user()->id;
        $model = User::find($this->userId);
        $this->name = $model->name;
        $this->last_name = $model->last_name;
        $this->phone = $model->phone;
        $this->email = $model->email;
        $this->date_birthday = $model->date_birthday;
        $this->gender = $model->gender;
        $this->city = $model->city;
        $this->address = $model->address;
        $this->discount_card = $model->discount_card;
        $this->region = $model->region;
        $this->street = $model->street;
        $this->home = $model->home;
        $this->house = $model->house;
        $this->registered_phone = $model->registered_phone;

        $this->prevName = $model->name;
        $this->prevlast_Name = $model->last_name;
        $this->prevPhone = $model->phone;
        $this->prevEmail = $model->email;
        $this->prevCity = $model->city;
        $this->prevGender = $model->gender;
        $this->prevDate_birthday = $model->date_birthday;
        $this->prevAddress = $model->address;
        $this->prevDiscount_card = $model->discount_card;
        $this->prevRegion = $model->region;
        $this->prevStreet = $model->street;
        $this->prevHome = $model->home;
        $this->prevHouse = $model->house;
        $this->prevRegistered_phone = $model->registered_phone;

    }


    public function save()
    {
        $this->validate();
        $data = [];

        // We will check if there are any changes in the fields
        if ($this->name !== $this->prevName) {
            $data = array_merge($data, ['name' => $this->name]);
        }
        if ($this->last_name !== $this->prevlast_Name) {
            $data = array_merge($data, ['last_name' => $this->last_name]);
        }
        if ($this->region !== $this->prevRegion) {
            $data = array_merge($data, ['region' => $this->region]);
        }
        if ($this->registered_phone !== $this->prevRegistered_phone) {
            $data = array_merge($data, ['$this->registered_phone' => $this->registered_phone]);
        }
        if ($this->gender !== $this->prevGender) {
            $data = array_merge($data, ['gender' => $this->gender]);
        }
        if ($this->city !== $this->prevCity) {
            $data = array_merge($data, ['city' => $this->city]);
        }
        if ($this->address !== $this->prevAddress) {
            $data = array_merge($data, ['address' => $this->address]);
        }
        if ($this->home !== $this->prevHome) {
            $data = array_merge($data, ['home' => $this->home]);
        }
        if ($this->house !== $this->prevHouse) {
            $data = array_merge($data, ['house' => $this->house]);
        }
        if ($this->street !== $this->prevStreet) {
            $data = array_merge($data, ['street' => $this->street]);
        }
        if ($this->date_birthday !== $this->prevDate_birthday) {
            $data = array_merge($data, ['date_birthday' => $this->date_birthday]);
        }
        if ($this->phone !== $this->prevPhone) {
            $data = array_merge($data, ['phone' => $this->phone]);
        }
        if ($this->email !== $this->prevEmail) {
            $data = array_merge($data, ['email' => $this->email]);
        }
        if ($this->discount_card !== $this->prevDiscount_card) {
            $data = array_merge($data, ['discount_card' => $this->discount_card]);
        }

        if($this->image)
        {
            $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
            $this->image->storeAs('users',$imageName);
            $data = array_merge($data, ['image'=> $imageName]);
        }
        if(count($data)) {
            User::find($this->userId)->update($data);

            $this->alert('success', 'Setting Updated Successfully  !! ', [
                'position' => 'bottom-end',
                'timer' => '3000',
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
    }
    public function render()
    {
        return view('livewire.frontend.cabinet.settings-component')->extends('layouts.base');
    }
}
