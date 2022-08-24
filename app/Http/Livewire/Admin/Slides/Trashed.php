<?php

namespace App\Http\Livewire\Admin\Slides;

use App\Models\Slide;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Trashed extends Component
{
    use LivewireAlert,AuthorizesRoleOrPermission;
    public $name = 'Trashed Slides',$currentPage = 1, $searchTerm,  $ordering;
    public bool $active;

    public function mount()
    {
        $this->authorizeRoleOrPermission('trash-list');

    }

    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            Slide::find($item['value'])->update(['ordering' => $item['order']]);
        }
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function restore($id)
    {
        Slide::withTrashed()->findOrFail($id)->restore();
        $this->alert('success', 'Slide Restored Successfully');
    }

    public function forceDelete(int $id)
    {
        $model = Slide::withTrashed()->findOrFail($id);
        $path = public_path().'/images/slides/'.$model->image;
        unlink($path);
        $model->forceDelete();
        $this->alert('warning', 'Slide has been deleted');

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
        $items = Slide::onlyTrashed()->where(function($sub_query){
            $sub_query->where('description', 'like', '%'.$this->searchTerm.'%');
        })->paginate(10);
        return view('livewire.admin.slides.trashed',compact('items'))->extends('layouts.admin');
    }
}
