<?php

namespace App\Http\Livewire\Admin\Supports;

use App\Models\Category;
use App\Models\Filter;
use App\Traits\AuthorizesRoleOrPermission;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CategoryFilter extends Component
{
    use LivewireAlert,AuthorizesRoleOrPermission;
    public $category_id;
    public $category;
    public $title;

    public function mount($category_id)
    {
        $this->authorizeRoleOrPermission('filter-edit');
        $this->category_id = $category_id ;
        $this->category = Category::whereId($category_id)->with('filters')->first();
    }

    public function detach($filter_id)
    {
        $this->category->filters()->wherePivot('filter_id','=',$filter_id)->detach();
        $this->alert('error', 'Detached Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);
    }
    public function attach($filter_id)
    {
        $this->category->filters()->attach($filter_id);
        $this->alert('success', 'Attached Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);
    }

    private function resetInputFields()
    {
        $this->title = '';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
        ]);
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
        ]);
        $criteria = new Filter();
        $criteria->title =$this->title;
        $criteria->save();
        $this->resetInputFields();
        $this->alert('success', 'Store has been created successfully');
    }
    public function render()
    {
        $sp_category = Category::whereId($this->category_id)->first();
        $items = Filter::get();
        return view('livewire.admin.supports.category-filter',compact('items','sp_category'))->extends('layouts.admin');
    }
}
