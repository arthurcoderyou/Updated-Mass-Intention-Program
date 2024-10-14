<?php

namespace App\Livewire\Admin\RolePermission;

use Livewire\Component;
use App\Models\ActivityLogs;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleEdit extends Component
{
    public $name;
    public $role_id;

    public function mount($role_id){
        $role = Role::find($role_id);

        $this->name = $role->name;
        $this->role_id = $role->id;
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => [
                'required',
                'string',
                'unique:roles,name,'.$this->role_id,
            ],

        ]);
    }

    public function save(){
        $this->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,'.$this->role_id,
            ],

        ]);

        //update
        $role = Role::find($this->role_id);

        $role->name = $this->name;

        $role->save();


        ActivityLogs::create([
            'log_action' => "Role \"".$role->name."\" updated ",
            'log_user' => Auth::user()->name,
            'created_by' => Auth::user()->id,
        ]);


        session()->flash('success','Role updated successfully');

        return redirect()->route('roles.index');

    }

    public function render()
    {
        return view('livewire.admin.role-permission.role-edit');
    }
}
