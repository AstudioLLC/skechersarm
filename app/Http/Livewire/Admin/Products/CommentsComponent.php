<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Comment;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Pagination\Paginator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class CommentsComponent extends Component
{
    use LivewireAlert,WithPagination,AuthorizesRoleOrPermission;
    public bool $validated;

    public  $currentPage = 1, $searchTerm,  $ordering;
    public function mount()
    {
        $this->authorizeRoleOrPermission('comment-list');

    }

    public function delete($id)
    {
        Comment::find($id)->delete();
        $this->alert('error', 'Comment Deleted Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);

    }
    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }
    public function render()
    {
        $query = '%'.$this->searchTerm.'%';

        $items = Comment::with('product','user')->orderBy('validated')->where(function($sub_query){
            $sub_query->where('body', 'like', '%'.$this->searchTerm.'%');
        })->paginate(10);

        return view('livewire.admin.products.comments-component',compact('items'))->extends('layouts.admin');
    }
}
