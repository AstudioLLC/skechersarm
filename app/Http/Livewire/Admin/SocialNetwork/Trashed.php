<?php

namespace App\Http\Livewire\Admin\SocialNetwork;

use App\Models\SocialNetwork;
use Illuminate\Pagination\Paginator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Trashed extends Component
{
    use LivewireAlert;
    public $name = 'Trashed Social network',$currentPage = 1, $searchTerm,  $ordering;
    public bool $active;


    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            SocialNetwork::find($item['value'])->update(['ordering' => $item['order']]);
        }
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function restore($id)
    {
        SocialNetwork::withTrashed()->findOrFail($id)->restore();
        $this->alert('success', 'Social network Restored Successfully');
    }

    public function forceDelete(int $id)
    {
        $model = SocialNetwork::withTrashed()->findOrFail($id);
        $path = public_path().'/images/social_network/'.$model->image;
        unlink($path);
        $model->forceDelete();
        $this->alert('warning', 'Social network has been deleted');

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
        $items = SocialNetwork::onlyTrashed()->where(function($sub_query){
            $sub_query->where('title', 'like', '%'.$this->searchTerm.'%');
        })->paginate(10);
        return view('livewire.admin.social-network.trashed',compact('items'))->extends('layouts.admin');
    }
}
