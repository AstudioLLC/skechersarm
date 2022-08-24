<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Pagination\Paginator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BlogsComponent extends Component
{
    use WithFileUploads, LivewireAlert, WithPagination,AuthorizesRoleOrPermission;

    public bool $active;
    public $trashed = false;

    public $name = 'Blog', $currentPage = 1, $searchTerm;

    public function mount()
    {
        $this->authorizeRoleOrPermission('blog-list');
    }

    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            Blog::find($item['value'])->update(['ordering' => $item['order']]);
        }
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
        Blog::find($id)->delete();
        $this->alert('error', 'Blog Deleted Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);

    }

    public function render()
    {
        $items = Blog::orderBy('ordering','asc')->where(function($sub_query){
            $sub_query->where('description', 'like', '%'.$this->searchTerm.'%');
        })->paginate(10);
        return view('livewire.admin.blog.blogs-component',compact('items'))->extends('layouts.admin');
    }
}
