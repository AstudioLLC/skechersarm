<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Show extends Component
{
    use LivewireAlert;

    public $user,$roles,$role;

    public function mount($id)
    {
        $this->id = $id;
        $this->user = User::where('id',$id)->with('roles')->first();
        $this->roles = Role::all();
    }

    public function updatedRole($value)
    {
        $this->user->assignRole([$value]);
    }

    public function deleteRole($role_id,$user_id)
    {
        DB::table('model_has_roles')->where('model_id',$user_id)->where('role_id',$role_id)->delete();
        $this->alert('warning', 'Role detached Successfully');

    }
    public function render()
    {
        $sender = Auth::user();
        $users = User::with(['message' => function($query) {
            return $query->orderBy('created_at', 'DESC');
                }])->where('is_admin', false)
                    ->orderBy('id', 'DESC')
                    ->get();
        $messages = Message::where('user_id', $sender)->orWhere('receiver', $sender)->orderBy('id', 'DESC')->get();

        return view('livewire.admin.users.show',compact('sender','users','messages'))->extends('layouts.admin');
    }
}
