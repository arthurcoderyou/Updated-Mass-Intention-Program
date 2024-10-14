<?php

namespace App\Livewire\Admin\IntentionType;

use Livewire\Component;
use App\Models\ActivityLogs;
use App\Models\IntentionType;
use Illuminate\Support\Facades\Auth;

class IntentionTypeCreate extends Component
{
    public string $name;
    public bool $status;

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required'],
        ]);

    }

    public function save(){
        $this->validate([
            'name' => ['required', 'string', 'max:255','unique:'.IntentionType::class],
            'status' => ['required'],
        ]);

        IntentionType::create([
            'name' => $this->name,
            'status' => $this->status,
            'created_by' => Auth::user()->id
        ]);

        ActivityLogs::create([
            'log_action' => "Intention type \"".$this->name."\" created  " ,
            'log_user' => Auth::user()->name,
            'created_by' => Auth::user()->id,
        ]);



        session()->flash('success','Intention type created successfully');

        return redirect()->route('intention_types.index');

    }

    public function render()
    {
        return view('livewire.admin.intention-type.intention-type-create');
    }
}
