<?php

namespace App\Http\Livewire\Admin\Supports;

use Illuminate\Support\Facades\Artisan;
use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class ToggleSwitch extends Component
{
    public Model $model;

    public $field;

    public $active;

    public $uniqueId;

    public function mount()
    {
        $this->active = (bool) $this->model->getAttribute($this->field);
        $this->uniqueId = uniqid();
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();
        Artisan::call('cache:clear');
    }
    public function render()
    {
        return view('livewire.admin.supports.toggle-switch');
    }
}
