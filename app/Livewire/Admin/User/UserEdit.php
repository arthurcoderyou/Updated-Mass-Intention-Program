<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use App\Models\ActivityLogs;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserEdit extends Component
{

    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public int $role;
    public int $user_id;

    public function mount($user_id){
        $user = User::find($user_id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = !empty($user->roles->first()->id) ? $user->roles->first()->id : 0;

        $this->password = "";
    }


    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class.',id,'.$this->user_id ],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'role' => ['required']
        ]);

        if(!empty($this->password)){
            $this->validateOnly($fields,[
                'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            ]);
        }
    }

    public function save(){
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class.',id,'.$this->user_id ],

            'role' => ['required']
        ]);

        if(!empty($this->password)){
            $this->validate([
                'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            ]);
        }

        $user = User::find($this->user_id);

        $user->name =  $this->name;
        $user->email = $this->email;


        $user->password = Hash::make($this->password);


        if(!empty($this->role)){
            //add role
            $role = Role::find($this->role);
            $user->assignRole($role);
        }

        //verify email as we create it
        $user->email_verified_at = now();
        $user->save();


        ActivityLogs::create([
            'log_action' => "User \"".$this->name."\" updated ",
            'log_user' => Auth::user()->name,
            'created_by' => Auth::user()->id,
        ]);



        session()->flash('success','User updated successfully');

        return redirect()->route('user.index');

    }



    public function render()
    {
        $roles = Role::orderBy('name','asc')->get();
        return view('livewire.admin.user.user-edit',[
            'roles' => $roles,
        ]);
    }
}
