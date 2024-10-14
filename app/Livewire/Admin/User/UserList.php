<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use App\Models\ActivityLogs;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class UserList extends Component
{
    use WithPagination;
    // public $roles;

    public $search = '';
    public $sort_by = '';
    public $record_count = 10;

    public function deleteUser($user_id){
        $user = User::find($user_id);

        $user->delete();

        ActivityLogs::create([
            'log_action' => "User \"".$user->name."\" deleted by ".Auth::user()->name,
            'log_user' => Auth::user()->name,
            'created_by' => Auth::user()->id,
        ]);


        session()->flash('success','User deleted successfully');
        return redirect()->route('user.index');

    }

    public function mount(){
        // $this->roles = Role::get();
    }


    public function render()
    {

        $users = User::where('name','like' ,'%'.$this->search.'%')
            ->orWhere('email','like' ,'%'.$this->search.'%');

        if(!empty($this->sort_by)){

            switch($this->sort_by){
                case "name_asc":
                    $users =  $users->orderBy('name','ASC');
                    break;

                case "name_desc":
                    $users =  $users->orderBy('name','DESC');
                    break;

                case "email_asc":
                    $users =  $users->orderBy('email','ASC');
                    break;

                case "email_desc":
                    $users =  $users->orderBy('email','DESC');
                    break;

                case "created_asc":
                    $users =  $users->orderBy('created_at','ASC');
                    break;

                case "created_desc":
                    $users =  $users->orderBy('created_at','DESC');
                    break;

                case "updated_asc":
                    $users =  $users->orderBy('updated_at','ASC');
                    break;

                case "updated_desc":
                    $users =  $users->orderBy('updated_at','DESC');
                    break;

            }


        }else{
            $users =  $users->orderBy('updated_at','DESC');

        }


        $users = $users->paginate($this->record_count);


        return view('livewire.admin.user.user-list',[
            'users' => $users
        ]);
    }
}
