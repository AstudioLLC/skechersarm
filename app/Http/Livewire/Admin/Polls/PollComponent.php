<?php

namespace App\Http\Livewire\Admin\Polls;

use App\Models\Poll;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Pagination\Paginator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PollComponent extends Component
{
    use AuthorizesRoleOrPermission,LivewireAlert;

    public $name = 'Polls', $currentPage = 1, $searchTerm,  $ordering;
    public bool $active;

    public function mount()
    {
        $this->authorizeRoleOrPermission('poll-list');
    }
    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }

    public function delete($id)
    {
        Poll::find($id)->delete();
        $this->alert('error', 'Poll Deleted Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);
    }
    public function render()
    {
        $query = '%'.$this->searchTerm.'%';
        $items = Poll::orderBy('ordering','asc')->where(function($sub_query){
            $sub_query->where('title', 'like', '%'.$this->searchTerm.'%');
        })->paginate(10);
        return view('livewire.admin.polls.poll-component',compact('items'))->extends('layouts.admin');
    }
}
