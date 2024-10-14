<?php

namespace App\Livewire\Admin\RequestTimeOption;

use Livewire\Component;
use App\Models\ActivityLogs;
use Livewire\WithPagination;
use App\Models\RequestTimeOption;
use Illuminate\Support\Facades\Auth;

class RequestTimeOptionList extends Component
{

    use WithPagination;
    // public $roles;

    public $search = '';
    public $sort_by = '';
    public $record_count = 10;

    public function deleteOption($option_id){
        $request_time_option = RequestTimeOption::find($option_id);

        //delete the connected records
        if(!empty($request_time_option->days)){
            foreach($request_time_option->days as $day){
                $day->delete();
            }
        }


        //delete the record
        $request_time_option->delete();

        ActivityLogs::create([
            'log_action' => "Request time option at \"".$request_time_option->time."-".$request_time_option->day."\" deleted by ".Auth::user()->name,
            'log_user' => Auth::user()->name,
            'created_by' => Auth::user()->id,
        ]);


        session()->flash('success','Request time option deleted successfully');
        return redirect()->route('request_time_options.index');

    }

    public function mount(){
        // $this->roles = Role::get();
        $this->record_count = 10;

    }

    public function render()
    {

        $request_time_options =  RequestTimeOption::select('request_time_options.*')
            ->where('id','>',0)
            ;

        if(!empty($this->search)){



            $request_time_options = $request_time_options->where(function($query) {
                // For `status`, assuming it is an int or enum
                if (is_numeric($this->search)) {
                    $query->where('status', $this->search);
                }

                // For `time`, assuming it is a time field
                try {
                    $searchTime = \Carbon\Carbon::createFromFormat('H:i', $this->search)->format('H:i:s');
                    $query->orWhere('time', 'like', '%' . $searchTime . '%');
                } catch (\Exception $e) {
                    // Handle the exception if search is not a valid time
                }

                // For `day`, assuming it is a string field
                // $query->orWhere('day', 'like', '%' . $this->search . '%');
            });

        }


        if(!empty($this->sort_by)){


            switch($this->sort_by){
                case "time_asc":
                    $request_time_options =  $request_time_options->orderBy('time','ASC');
                    break;

                case "time_desc":
                    $request_time_options =  $request_time_options->orderBy('time','DESC');
                    break;



                case "created_asc":
                    $request_time_options =  $request_time_options->orderBy('created_at','ASC');
                    break;

                case "created_desc":
                    $request_time_options =  $request_time_options->orderBy('created_at','DESC');
                    break;

                case "updated_asc":
                    $request_time_options =  $request_time_options->orderBy('updated_at','ASC');
                    break;

                case "updated_desc":
                    $request_time_options =  $request_time_options->orderBy('updated_at','DESC');
                    break;

            }


        }else{
            // dd("Here");

            $request_time_options =  $request_time_options->orderBy('updated_at','DESC');

        }
        // dd($this->record_count);

        $request_time_options = $request_time_options->paginate($this->record_count);

        // dd($request_time_options);
        return view('livewire.admin.request-time-option.request-time-option-list',[
            'request_time_options' => $request_time_options,
        ]);
    }
}
