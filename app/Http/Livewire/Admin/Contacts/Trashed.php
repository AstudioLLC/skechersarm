<?php

namespace App\Http\Livewire\Admin\Contacts;

use App\Models\Contact;
use Illuminate\Pagination\Paginator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Trashed extends Component
{

    use LivewireAlert;
    public $name_contact = 'Trashed Contact',$currentPage = 1, $searchTerm,  $ordering;
    public bool $active;


    public function updateOrdering($items)
    {
        foreach ($items as $item)
        {
            Contact::find($item['value'])->update(['ordering' => $item['order']]);
        }
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function restore($id)
    {
        Contact::withTrashed()->findOrFail($id)->restore();
        $this->alert('success', 'Contact Restored Successfully');
    }

    public function forceDelete(int $id)
    {
        $model = Contact::withTrashed()->findOrFail($id);
        $model->forceDelete();
        $this->alert('warning', 'Contact has been deleted');

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
        $items = Contact::onlyTrashed()->where(function($sub_query){
            $sub_query->where('name', 'like', '%'.$this->searchTerm.'%');
        })->paginate(10);
        return view('livewire.admin.contacts.trashed', compact('items'))->extends('layouts.admin');
    }
}
