<?php

namespace App\Http\Livewire\Admin\Career;

use App\Models\Career;
use App\Traits\AuthorizesRoleOrPermission;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use AuthorizesRoleOrPermission,WithFileUploads,LivewireAlert;
    public $career_id;
    public $title;
    public $content;
    public $description;
    public $schedule;
    public $hours;
    public $salary;
    public $city;
    public $deadline;
    public $image;
    public $active;
    public $ordering;

    public function mount()
    {
        $this->authorizeRoleOrPermission('career-create');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
        'title' => 'required',
        'content' => 'nullable',
        'description' => 'required',
        'schedule' => 'required',
        'hours' => 'required',
        'salary' => 'required',
        'city' => 'required',
        'deadline' => 'required',
        'image' => 'nullable',
        ]);
    }

    public function store()
    {
        $this->validate(
            [
                'title' => 'required',
                'content' => 'nullable',
                'description' => 'required',
                'schedule' => 'required',
                'hours' => 'required',
                'salary' => 'required',
                'city' => 'required',
                'deadline' => 'required',
                'image' => 'nullable',
            ],
        );
        $career = new Career();
        $career->title = $this->title;
        $career->content = $this->content;
        $career->description = $this->description;
        $career->schedule = $this->schedule;
        $career->hours = $this->hours;
        $career->salary = $this->salary;
        $career->city = $this->city;
        $career->deadline = $this->deadline;

        $career->save();
        $this->alert('success', 'Career has been created Successfully');
        return redirect()->route('admin.career');

    }
    public function render()
    {
        return view('livewire.admin.career.create')->extends('layouts.admin');
    }
}
