<?php

namespace App\Http\Livewire\Admin\Polls;

use App\Models\Poll;
use App\Models\PollOption;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Options extends Component
{
    use AuthorizesRoleOrPermission,LivewireAlert,WithPagination;

    public $poll;
    public $title;

    public function mount($id)
    {
        $this->authorizeRoleOrPermission('poll-create');
        $this->poll = Poll::whereId($id)->first();
    }

    /**
     * Write code on Method
     *
     */
    private function resetInputFields()
    {
        $this->title = '';
    }

    /**
     * Write code on Method
     *
     */

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
        ]);
    }

    public function delete($id)
    {
        PollOption::find($id)->delete();
        $this->alert('error', 'Option Deleted Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);
    }
    public function store()
    {
        $item = new PollOption();
        $item->title = $this->title;
        $item->poll_id = $this->poll->id;
        $item->save();
        $this->resetInputFields();

        $this->alert('success', 'Option has been created successfully');

    }
    public function render()
    {
        $items = PollOption::wherePollId($this->poll->id)->get();
        return view('livewire.admin.polls.options',compact('items'))->extends('layouts.admin');
    }
}
