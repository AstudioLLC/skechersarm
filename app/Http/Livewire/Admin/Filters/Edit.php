<?php

namespace App\Http\Livewire\Admin\Filters;

use App\Traits\AuthorizesRoleOrPermission;
use Livewire\Component;

class Edit extends Component
{
    use AuthorizesRoleOrPermission;
    public function mount()
    {
        $this->authorizeRoleOrPermission('filter-edit');

    }

    public function render()
    {
        return view('livewire.admin.filters.edit');
    }
}
