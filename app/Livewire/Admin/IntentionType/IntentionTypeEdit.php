<?php

namespace App\Livewire\Admin\IntentionType;

use Livewire\Component;
use App\Models\ActivityLogs;
use App\Models\IntentionType;
use Illuminate\Support\Facades\Auth;

class IntentionTypeEdit extends Component
{
    public string $name;
    public $status;
    public int $intention_type_id;

    public function mount($intention_type_id){
        $intention_type = IntentionType::find($intention_type_id);

        $this->name = $intention_type->name;
        $this->status = $intention_type->status;
        $this->intention_type_id = $intention_type->id;


    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => ['required', 'string', 'max:255', 'unique:'.IntentionType::class,',id,'.$this->intention_type_id ],
            'status' => ['required'],
        ]);

    }

    public function update(){
        $this->validate([
            'name' => ['required', 'string', 'max:255','unique:'.IntentionType::class.',id,'.$this->intention_type_id ],
            'status' => ['required'],
        ]);

        $intention_type = IntentionType::find($this->intention_type_id);
        $intention_type->name = $this->name;
        $intention_type->status = $this->status;
        $intention_type->save();



        ActivityLogs::create([
            'log_action' => "Intention type \"".$this->name."\" updated " ,
            'log_user' => Auth::user()->name,
            'created_by' => Auth::user()->id,
        ]);



        session()->flash('success','Intention type updated successfully');

        return redirect()->route('intention_types.index');

    }


    public function render()
    {
        return view('livewire.admin.intention-type.intention-type-edit');
    }
}
