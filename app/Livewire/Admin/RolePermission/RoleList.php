<?php

namespace App\Livewire\Admin\RolePermission;

use Livewire\Component;
use App\Models\ActivityLogs;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleList extends Component
{
    use WithPagination;
    // public $roles;

    public $search = '';
    public $sort_by = '';
    public $record_count = 10;

    public function deleteRole($role_id){
        $role = Role::find($role_id);

        $role->delete();

        ActivityLogs::create([
            'log_action' => "Role \"".$role->name."\" deleted by ".Auth::user()->name,
            'log_user' => Auth::user()->name,
            'created_by' => Auth::user()->id,
        ]);


        session()->flash('success','Role deleted successfully');
        return redirect()->route('roles.index');

    }

    public function mount(){
        // $this->roles = Role::get();
    }

    public function render()
    {
        $roles = Role::where('name','like' ,'%'.$this->search.'%');

        if(!empty($this->sort_by)){

            switch($this->sort_by){
                case "name_asc":
                    $roles =  $roles->orderBy('name','ASC');
                    break;

                case "name_desc":
                    $roles =  $roles->orderBy('name','DESC');
                    break;

                case "created_asc":
                    $roles =  $roles->orderBy('created_at','ASC');
                    break;

                case "created_desc":
                    $roles =  $roles->orderBy('created_at','DESC');
                    break;

                case "updated_asc":
                    $roles =  $roles->orderBy('updated_at','ASC');
                    break;

                case "updated_desc":
                    $roles =  $roles->orderBy('updated_at','DESC');
                    break;

            }


        }else{
            $roles =  $roles->orderBy('updated_at','DESC');

        }


        $roles = $roles->paginate($this->record_count);

        return view('livewire.admin.role-permission.role-list',[
            'roles' => $roles
        ]);
    }
}
