<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class UsersComponent extends Component
{
    use LivewireAlert, WithPagination;

    public bool $active;
    public $seenCount;

    public $name = 'Users', $currentPage = 1, $searchTerm;


    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            User::find($item['value'])->update(['ordering' => $item['order']]);
        }
    }
    public function updateSeen()
    {
        DB::table('users')->update(['seen' => true]);
        $this->alert('success', 'Updated Successfully');
        $this->emitTo('admin.supports.left-menu','refreshLeftMenu');

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
        User::find($id)->delete();
        $this->alert('warning', 'User Deleted Successfully');

    }
    public function render()
    {
        $query = '%'.$this->searchTerm.'%';
        $this->seenCount = User::where('seen',false)->count();

        $items = User::with('roles')->where('is_admin', !1)->orderBy('seen','asc')->orderBy('ordering','asc')->where(function($sub_query){
            $sub_query->where('name', 'like', '%'.$this->searchTerm.'%');
        })->paginate(10);

        return view('livewire.admin.users.users-component',compact('items'))->extends('layouts.admin');
    }
}
