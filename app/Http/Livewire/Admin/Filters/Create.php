<?php

namespace App\Http\Livewire\Admin\Filters;

use App\Models\Filter;
use App\Traits\AuthorizesRoleOrPermission;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert,AuthorizesRoleOrPermission;
    public $title,$item_id;
    public $updateMode = false;

    public function mount()
    {
        $this->authorizeRoleOrPermission('filter-list');

    }

    public function edit($id)
    {
        $filter = Filter::findOrFail($id);
        $this->item_id = $id;
        $this->title = $filter->getTranslations('title');

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

        $filter = Filter::find($this->item_id);
        $filter->update([
            'title' => $this->title,
        ]);

        $this->updateMode = false;

        $this->alert('success', 'Filter has been updated successfully');
        $this->resetInputFields();
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
        $item = new Filter();
        $item->title =$this->title;
        $item->save();
        $this->resetInputFields();
        $this->alert('success', 'Filter has been created successfully');
    }
    public function delete($id)
    {
        Filter::find($id)->delete();
        $this->alert('warning', 'Criteria Deleted Successfully');

    }
    public function render()
    {
        $items = Filter::get();
        return view('livewire.admin.filters.create',compact('items'))->extends('layouts.admin');
    }
}
