<?php

namespace App\Livewire\Admin\RolePermission;

use Livewire\Component;
use App\Models\ActivityLogs;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleCreate extends Component
{

    public $name;

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => [
                'required',
                'string',
                'unique:roles,name',
            ],

        ]);
    }

    public function save(){
        $this->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name',
            ],

        ]);

        //save
        Role::create([
            'name' => $this->name,
        ]);

        ActivityLogs::create([
            'log_action' => "Role \"".$this->name."\" created ",
            'log_user' => Auth::user()->name,
            'created_by' => Auth::user()->id,
        ]);



        session()->flash('success','Roles created successfully');

        return redirect()->route('roles.index');

    }

    public function render()
    {
        return view('livewire.admin.role-permission.role-create');
    }
}
