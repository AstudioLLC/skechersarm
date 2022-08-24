<?php

namespace App\Http\Livewire\Admin\Information;

use App\Models\Information;
use Illuminate\Pagination\Paginator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Trashed extends Component
{
    use LivewireAlert;
    public $name = 'Trashed Information',$currentPage = 1, $searchTerm,  $ordering;
    public bool $active;


    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            Information::find($item['value'])->update(['ordering' => $item['order']]);
        }
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function restore($id)
    {
        Information::withTrashed()->findOrFail($id)->restore();
        $this->alert('success', 'Information Restored Successfully');
    }

    public function forceDelete(int $id)
    {
        $model = Information::withTrashed()->findOrFail($id);
        $model->forceDelete();
        $this->alert('warning', 'Information has been deleted');

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
        $items = Information::onlyTrashed()->where(function($sub_query){
            $sub_query->where('address', 'like', '%'.$this->searchTerm.'%');
        })->paginate(10);
        return view('livewire.admin.information.trashed', compact('items'))->extends('layouts.admin');
    }
}
