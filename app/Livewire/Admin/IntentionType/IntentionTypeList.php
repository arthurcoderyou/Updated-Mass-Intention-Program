<?php

namespace App\Livewire\Admin\IntentionType;

use Livewire\Component;
use App\Models\ActivityLogs;
use Livewire\WithPagination;
use App\Models\IntentionType;
use Illuminate\Support\Facades\Auth;

class IntentionTypeList extends Component
{
    use WithPagination;
    // public $roles;

    public $search = '';
    public $sort_by = '';
    public $record_count = 10;

    public function deleteIntentionType($type_id){
        $type = IntentionType::find($type_id);

        $type->delete();

        ActivityLogs::create([
            'log_action' => "Intention type \"".Auth::user()->name."\" deleted by ".Auth::user()->name,
            'log_user' => Auth::user()->name,
            'created_by' => Auth::user()->id,
        ]);


        session()->flash('success','Intention type deleted successfully');
        return redirect()->route('intention_types.index');

    }

    public function mount(){
        // $this->roles = Role::get();
    }


    public function render()
    {
        $intention_types = IntentionType::where('name','like' ,'%'.$this->search.'%');

        if(!empty($this->sort_by)){

            switch($this->sort_by){
                case "name_asc":
                    $intention_types =  $intention_types->orderBy('name','ASC');
                    break;

                case "name_desc":
                    $intention_types =  $intention_types->orderBy('name','DESC');
                    break;


                case "created_asc":
                    $intention_types =  $intention_types->orderBy('created_at','ASC');
                    break;

                case "created_desc":
                    $intention_types =  $intention_types->orderBy('created_at','DESC');
                    break;

                case "updated_asc":
                    $intention_types =  $intention_types->orderBy('updated_at','ASC');
                    break;

                case "updated_desc":
                    $intention_types =  $intention_types->orderBy('updated_at','DESC');
                    break;

            }


        }else{
            $intention_types =  $intention_types->orderBy('updated_at','DESC');

        }


        $intention_types = $intention_types->paginate($this->record_count);


        return view('livewire.admin.intention-type.intention-type-list',[
            'intention_types' => $intention_types
        ]);
    }
}
