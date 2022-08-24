<?php

namespace App\Http\Livewire\Admin\Career\Requests;

use App\Models\Career;
use App\Models\JobRequest;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class JobRequestsComponent extends Component
{
    use AuthorizesRoleOrPermission;

    public $items;
    public $parent;

    public function mount($id)
    {
        $this->authorizeRoleOrPermission('jobRequest-list');

        $this->items = JobRequest::where('career_id',$id)->orderBy('seen')->get();
        $this->parent = Career::where('id',$id)->first();
        DB::table('job_requests')->where('career_id',$id)->update(['seen' => true]);
    }
    public function render()
    {
        return view('livewire.admin.career.requests.job-requests-component')->extends('layouts.admin');
    }
}
