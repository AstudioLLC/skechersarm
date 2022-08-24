<?php

namespace App\Http\Livewire\Admin\Career;

use App\Models\Career;
use App\Models\JobRequest;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class CareerComponent extends Component
{
    use LivewireAlert, WithPagination,AuthorizesRoleOrPermission;

    public bool $active;
    public $careerSeenCount;

    public $name = 'Workplace', $currentPage = 1, $searchTerm,  $ordering;

    public function mount()
    {
        $this->authorizeRoleOrPermission('career-list');

    }

    public function updateSeen()
    {
        DB::table('job_requests')->update(['seen' => true]);
        $this->alert('success', 'Updated Successfully');
        $this->emitTo('admin.supports.left-menu','refreshLeftMenu');
    }
    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            Career::find($item['value'])->update(['ordering' => $item['order']]);
        }
    }

    public function delete($id)
    {
        Career::find($id)->delete();
        $this->alert('warning', 'Career Deleted Successfully');

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
        $this->careerSeenCount = JobRequest::where('seen',false)->get();

        $query = '%'.$this->searchTerm.'%';
        $items = Career::orderBy('ordering','asc')->where(function($sub_query){
            $sub_query->where('description', 'like', '%'.$this->searchTerm.'%');
        })->paginate(10);

        return view('livewire.admin.career.career-component',compact('items'))->extends('layouts.admin');
    }
}
