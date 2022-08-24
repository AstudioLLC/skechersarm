<?php

namespace App\Http\Livewire\Admin\QuestionAnswer;

use App\Models\QuestionAnswer;
use App\Traits\AuthorizesRoleOrPermission;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class QuestionAnswerComponent extends Component
{
    use LivewireAlert,WithFileUploads,AuthorizesRoleOrPermission;
    public $name = 'Question & Answer';

    public $question, $answer, $active, $ordering;


    public function mount()
    {
         $this->authorizeRoleOrPermission('questionAnswer-edit');
    }

    public function delete($id)
    {
        QuestionAnswer::find($id)->delete();
        $this->alert('warning', 'Block Deleted Successfully');
    }
    private function resetInputFields()
    {
        $this->question = '';
        $this->answer = '';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'question' => 'required',
            'answer' => 'required',
        ]);
    }

    public function store()
    {
        $this->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $block = new QuestionAnswer();
        $block->question =$this->question;
        $block->answer =$this->answer;
        $block->save();
        $this->resetInputFields();
        $this->alert('success', 'Block has been created successfully');
    }
    public function render()
    {
        $items = QuestionAnswer::get();
        return view('livewire.admin.question-answer.question-answer-component',compact('items'))->extends('layouts.admin');
    }
}
