<?php

namespace App\Http\Livewire\Admin\Bonus;

use App\Models\BonusCard;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Pagination\Paginator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BonusComponent extends Component
{

    use WithFileUploads, LivewireAlert, WithPagination,AuthorizesRoleOrPermission;

    public bool $active;
    public $trashed = false;

    public $name = 'Bonus Cart', $currentPage = 1, $searchTerm;

//    public function mount()
//    {
//        $this->authorizeRoleOrPermission('blog-list');
//    }

    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            BonusCard::find($item['value'])->update(['ordering' => $item['order']]);
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
        BonusCard::find($id)->delete();
        $this->alert('error', 'BonusCard Deleted Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);

    }


    public function render()
    {
        $items = BonusCard::get();
        return view('livewire.admin.bonus.bonus-component',compact('items'))->extends('layouts.admin');
    }
}
