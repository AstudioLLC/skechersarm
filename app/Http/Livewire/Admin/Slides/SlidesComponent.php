<?php

namespace App\Http\Livewire\Admin\Slides;

use App\Models\Slide;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class SlidesComponent extends Component
{
    use LivewireAlert, WithPagination,AuthorizesRoleOrPermission;

    public bool $active;

    public $name = 'Slides', $currentPage = 1, $searchTerm,  $ordering;

    public function mount()
    {
        $this->authorizeRoleOrPermission('slide-list');

    }

    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            Slide::find($item['value'])->update(['ordering' => $item['order']]);
        }
    }


    public function delete($id)
    {
        Slide::find($id)->delete();
        $this->alert('warning', 'Slide Deleted Successfully');

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

        $items = Slide::orderBy('ordering','asc')->where(function($sub_query){
            $sub_query->where('description', 'like', '%'.$this->searchTerm.'%');
        })->paginate(10);
        return view('livewire.admin.slides.slides-component',compact('items'))->extends('layouts.admin');
    }
}
