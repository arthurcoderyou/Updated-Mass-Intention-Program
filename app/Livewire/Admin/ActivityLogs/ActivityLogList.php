<?php

namespace App\Livewire\Admin\ActivityLogs;

use App\Models\ActivityLogs;
use Livewire\Component;
use Livewire\WithPagination;

class ActivityLogList extends Component
{


    use WithPagination;
    // public $roles;

    public $search = '';
    public $sort_by = '';
    public $record_count = 10;

    public function deleteActivityLog($log_id){
        $log = ActivityLogs::find($log_id);

        $log->delete();
        session()->flash('success','Log deleted successfully');
        return redirect()->route('activity_logs.index');

    }

    public function mount(){
        // $this->roles = Role::get();
    }

    public function render()
    {
        $logs = ActivityLogs::where('log_action','like' ,'%'.$this->search.'%')
            ->orWhere('log_user','like' ,'%'.$this->search.'%');

        if(!empty($this->sort_by)){

            switch($this->sort_by){
                case "log_action_asc":
                    $logs =  $logs->orderBy('log_action','ASC');
                    break;

                case "log_action_desc":
                    $logs =  $logs->orderBy('log_action','DESC');
                    break;

                case "log_user_asc":
                    $logs =  $logs->orderBy('log_user','ASC');
                    break;

                case "log_user_desc":
                    $logs =  $logs->orderBy('log_user','DESC');
                    break;

                case "created_asc":
                    $logs =  $logs->orderBy('created_at','ASC');
                    break;

                case "created_desc":
                    $logs =  $logs->orderBy('created_at','DESC');
                    break;

            }


        }else{
            $logs =  $logs->orderBy('updated_at','DESC');

        }


        $logs = $logs->paginate($this->record_count);


        return view('livewire.admin.activity-logs.activity-log-list',[
            'logs' => $logs
        ]);
    }
}
