<?php

namespace App\Livewire\Admin\RolePermission;

use Livewire\Component;
use App\Models\ActivityLogs;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionList extends Component
{
    use WithPagination;
    // public $permissions;
    public $search = '';
    public $sort_by = '';
    public $record_count = 10;

    public function updatingSearch(){
        $this->resetPage();
    }


    public function deletePermission($permission_id){
        $permission = Permission::find($permission_id);

        $permission->delete();

        ActivityLogs::create([
            'log_action' => "Permission \"".$permission->name."\" deleted by ".Auth::user()->name,
            'log_user' => Auth::user()->name,
            'created_by' => Auth::user()->id,
        ]);

        session()->flash('success','Permissions deleted successfully');
        return redirect()->route('permissions.index');

    }

    public function mount(){

        // if(!empty($this->search )){
        //     $this->permissions = Permission::whereLike('name', $this->search ?? '')
        //         ->get();
        // }else{

        //     $this->permissions = Permission::get();
        // }



    }

    public function render()
    {
        $permissions = Permission::where('name','like' ,'%'.$this->search.'%')
            ->orWhere('module','like' ,'%'.$this->search.'%');

        if(!empty($this->sort_by)){

            switch($this->sort_by){
                case "name_asc":
                    $permissions =  $permissions->orderBy('name','ASC');
                    break;

                case "name_desc":
                    $permissions =  $permissions->orderBy('name','DESC');
                    break;

                case "created_asc":
                    $permissions =  $permissions->orderBy('created_at','ASC');
                    break;

                case "created_desc":
                    $permissions =  $permissions->orderBy('created_at','DESC');
                    break;

                case "updated_asc":
                    $permissions =  $permissions->orderBy('updated_at','ASC');
                    break;

                case "updated_desc":
                    $permissions =  $permissions->orderBy('updated_at','DESC');
                    break;

            }


        }else{
            $permissions =  $permissions->orderBy('updated_at','DESC');

        }


        $permissions = $permissions->paginate($this->record_count);


        return view('livewire.admin.role-permission.permission-list',[
            'permissions' => $permissions
        ]);
    }
}
