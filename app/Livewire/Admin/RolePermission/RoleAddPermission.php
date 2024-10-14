<?php

namespace App\Livewire\Admin\RolePermission;

use Livewire\Component;
use App\Models\ActivityLogs;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RoleAddPermission extends Component
{

    public $selected_permissions = [];
    public $role_id;
    public $role;

    public function mount($role_id){

        $this->role_id = $role_id;
        $this->role = Role::find($role_id);

        // Get the role's current permissions and set them as the selected permissions
        $this->selected_permissions = $this->role->permissions->pluck('id')->toArray();

    }


    // Method to select/deselect all checkboxes
    public function selectAll($value)
    {
        if ($value) {
            // Select all within the module
            $this->selected_permissions = Permission::pluck('id')->toArray();
        }else{
            $this->selected_permissions = [];
        }
    }

    public function updated($fields){

        $this->validateOnly($fields,[
            'selected_permissions' => 'required|array|min:1', // Ensure it's an array with at least one selection
        ]);

    }

    public function save(){
        $this->validate([
            'selected_permissions' => 'required|array|min:1', // Ensure it's an array with at least one selection
        ]);

        $sync_permissions = [];
        if(!empty($this->selected_permissions)){
            $sync_permissions = Permission::whereIn('id',$this->selected_permissions)->get();
        }

        // Sync permissions (this will remove permissions that are not selected and add the new ones)
        $this->role->syncPermissions($sync_permissions);

        ActivityLogs::create([
            'log_action' => "Role \"".$this->role->name."\" has updated permisssions ",
            'log_user' => Auth::user()->name,
            'created_by' => Auth::user()->id,
        ]);


        // Optionally, show a success message or do something after saving
        session()->flash('success', 'Role permissions updated successfully.');

        return redirect()->route('roles.add_permission',['role' => $this->role_id]);

    }


    public function render()
    {

        // $permissions = Permission::all();

        $module_permissions = Permission::all()->groupBy('module');

        // $headers = [];

        // foreach ($modules as $module => $value) {
        //     $headers[$module] = $value->toArray();
        // }

        // dd($module_permissions);


        return view('livewire.admin.role-permission.role-add-permission',[
            'module_permissions' => $module_permissions ,
        ]);
    }
}
