<?php

namespace App\Http\Livewire\Frontend\Pages\Static;

use App\Models\Career;
use App\Models\JobRequest;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class VacancyDetailsComponent extends Component
{
    use LivewireAlert,WithFileUploads;

    public $item;
    public $item_id;

    public $name;
    public $surname;
    public $phone;
    public $email;
    public $file;
    public $notes;

    public function mount($id)
    {
        $this->item = Career::whereId($id)->first();
        $this->item_id = $id;
    }

    private function resetInputs()
    {
        $this->name = '';
        $this->surname = '';
        $this->phone = '';
        $this->email = '';
        $this->file = '';
        $this->notes = '';
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            "file" => "nullable|max:10000",
            'notes' => 'nullable'
        ]);
    }

    public function store()
    {
        $this->validate(
            [
                'name' => 'required',
                'surname' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                "file" => "nullable|max:10000",
                'notes' => 'nullable'

            ],
        );
        $item = new JobRequest();
        $item->name = $this->name;
        $item->surname = $this->surname;
        $item->phone = $this->phone;
        $item->email = $this->email;
        $item->career_id = $this->item_id;
        $item->notes = $this->notes;
        if ($this->file) {
            $fileName = Carbon::now()->timestamp . '.' . $this->file->getClientOriginalName();
            $this->file->storeAs('images/jobRequests', $fileName);
            $item->file = $fileName;
        }
        $item->save();
        $this->resetInputs();
        $this->alert('success', 'Request has been Send Successfully');
    }
    public function render()
    {
        return view('livewire.frontend.pages.static.vacancy-details-component')->extends('layouts.base');
    }
}
