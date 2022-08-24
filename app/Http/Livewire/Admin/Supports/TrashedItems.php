<?php

namespace App\Http\Livewire\Admin\Supports;

use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use function PHPUnit\Framework\directoryExists;

class TrashedItems extends Component
{
    use LivewireAlert,AuthorizesRoleOrPermission,WithPagination;

    public $name = 'Trashed Items',$currentPage = 1, $searchTerm,  $ordering;
    public $model;
    public $path;

    public function mount($model,$path)
    {
        $this->authorizeRoleOrPermission('trash-list');

        $this->model = 'App\Models'.'\\'.$model;
        $this->path = $path;
    }
    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            $this->model::find($item['value'])->update(['ordering' => $item['order']]);
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function restore($id)
    {
        $this->model::withTrashed()->findOrFail($id)->restore();
        $this->alert('success', 'Item Restored Successfully');
    }

    public function forceDelete(int $id)
    {
        $model = $this->model::withTrashed()->findOrFail($id);
        $filePath = public_path().'/images/'.$this->path.'/'.$model->image;
        if ($model->image){
            unlink($filePath);
        }
        $model->forceDelete();
        $this->alert('warning', 'Item has been deleted');
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

        $items = $this->model::onlyTrashed()->paginate(10);

        return view('livewire.admin.supports.trashed-items',compact('items'))->extends('layouts.admin');
    }
}
