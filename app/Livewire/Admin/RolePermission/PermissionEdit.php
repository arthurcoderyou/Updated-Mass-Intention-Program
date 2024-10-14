<?php

namespace App\Livewire\Admin\RolePermission;

use Livewire\Component;
use App\Models\ActivityLogs;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionEdit extends Component
{

    public $name;
    public $module;
    public $permission_id;

    public function mount($permission_id){
        $permission = Permission::find($permission_id);

        $this->name = $permission->name;
        $this->module = $permission->module;
        $this->permission_id = $permission->id;
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => [
                'required',
                'string',
                'unique:permissions,name,'.$this->permission_id,
            ],
            'module' => [
                'required',
            ]

        ]);
    }

    public function save(){
        $this->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,'.$this->permission_id,
            ],
            'module' => [
                'required',
            ]

        ]);

        //update
        $permission = Permission::find($this->permission_id);

        $permission->name = $this->name;
        $permission->module = $this->module;

        $permission->save();

        ActivityLogs::create([
            'log_action' => "Permission \"".$this->name."\" updated  " ,
            'log_user' => Auth::user()->name,
            'created_by' => Auth::user()->id,
        ]);



        session()->flash('success','Permissions updated successfully');

        return redirect()->route('permissions.index');

    }

    public function render()
    {
        return view('livewire.admin.role-permission.permission-edit');
    }
}
