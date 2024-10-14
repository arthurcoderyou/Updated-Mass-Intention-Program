<?php

namespace App\Livewire\Admin\RolePermission;

use Livewire\Component;
// use Spatie\Permission\Contracts\Permission;
use App\Models\ActivityLogs;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionCreate extends Component
{
    public $name;
    public $module;

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => [
                'required',
                'string',
                'unique:permissions,name',
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
            'unique:permissions,name',
            ],
            'module' => [
                'required',
            ]

        ]);

        //save
        Permission::create([
            'name' => $this->name,
            'module' => $this->module,
        ]);



        ActivityLogs::create([
            'log_action' => "New permission \"".$this->name."\" created " ,
            'log_user' => Auth::user()->name,
            'created_by' => Auth::user()->id,
        ]);

        session()->flash('success','Permissions created successfully');

        return redirect()->route('permissions.index');

    }

    public function render()
    {
        return view('livewire.admin.role-permission.permission-create');
    }
}
