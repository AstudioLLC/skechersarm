<?php

namespace App\Http\Livewire\Admin\Supports;

use App\Models\Criteria;
use App\Models\Filter;
use App\Traits\AuthorizesRoleOrPermission;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CategoryFilterCriteries extends Component
{
    use LivewireAlert,AuthorizesRoleOrPermission;

    public $filter_id;
    public $filter;
    public $title,$item_id;
    public $updateMode = false;


    public function edit($id)
    {
        $this->authorizeRoleOrPermission('criteria-create');
        $criteria = Criteria::findOrFail($id);
        $this->item_id = $id;
        $this->title = $criteria->getTranslations('title');

        $this->updateMode = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
        ]);

        $criteria = Criteria::find($this->item_id);
        $criteria->update([
            'title' => $this->title,
        ]);

        $this->updateMode = false;

        $this->alert('success', 'Criteria has been updated successfully');
        $this->resetInputFields();
    }

    public function mount($filter_id)
    {
        $this->filter_id = $filter_id;
        $this->filter = Filter::whereId($filter_id)->first();
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
        $criteria = new Criteria();
        $criteria->title =$this->title;
        $criteria->filter_id = $this->filter_id;
        $criteria->save();
        $this->resetInputFields();
        $this->alert('success', 'Store has been created successfully');
    }
    public function delete($id)
    {
        Criteria::find($id)->delete();
        $this->alert('warning', 'Criteria Deleted Successfully');

    }
    public function render()
    {
        $items = Criteria::whereFilterId($this->filter_id)->get();
        return view('livewire.admin.supports.category-filter-criteries',compact('items'))->extends('layouts.admin');
    }
}
