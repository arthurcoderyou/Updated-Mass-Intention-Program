<?php

namespace App\Livewire\Admin\RequestTimeOption;

use Carbon\Carbon;
use App\Models\Day;
use Livewire\Component;
use App\Models\ActivityLogs;
use App\Models\RequestTimeOption;
use Illuminate\Support\Facades\Auth;
use App\Models\RequestTimeOptionDays;

class RequestTimeOptionEdit extends Component
{
    public $DaysOfTheWeek = [];
    public $time;
    public $day = [];
    public $status;
    public $request_time_option_id;


    public function mount($request_time_option_id){
        $this->DaysOfTheWeek = Day::where('id','>',0)->get();

        $request_time_option = RequestTimeOption::findOrFail($request_time_option_id);



        $this->request_time_option_id = $request_time_option->id;


        $this->time = $request_time_option->time;
        $this->status = $request_time_option->status;

        // dd($request_time_option->id);

        $selected_days = RequestTimeOptionDays::where('request_time_option_id',$request_time_option->id)->pluck('day_id')->toArray();

        // dd($selected_days);


        $this->day = $selected_days;



        // dd($this->DaysOfTheWeek );
    }

    public function updated($fields){
        $this->validateOnly($fields, [
            'time' => 'required', // Ensuring the correct time format like 1:00am
            'day' => 'required|array|min:1', // At least one day should be selected
            'status' => 'required', // Must be 0 or 1
        ]);
    }

    // Method to select/deselect all checkboxes
    public function selectAll($value)
    {
        if ($value) {
            // Select all within the module
            $this->day = Day::pluck('id')->toArray();
        }else{
            $this->day = [];
        }
    }

    public function save(){
        $this->validate([
            'time' => 'required',
            'day' => 'required|array|min:1',
            'status' => 'required',
        ]);

        // Update request t ime option
        $request_time_option = RequestTimeOption::find($this->request_time_option_id);

        $request_time_option->time = $this->time;
        $request_time_option->status = $this->status;
        $request_time_option->save();


        // Array of days corresponding to 0-6 integers
        $daysOfWeek = Carbon::getDays(); // ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
        $day_text = "";


        //delete all previuos records first, to save the new one
        if(!empty($request_time_option->days)){
            foreach( $request_time_option->days as $option_days){
                $option_days->delete();
            }
        }



        // Loop through selected days and check for duplicates
        foreach ($this->day as $selectedDay) {
            $day_text .= $daysOfWeek[$selectedDay - 1]." ";

            //create request time options days
            //request time options days connects this time to the days
            RequestTimeOptionDays::create([
                'day_id' => $selectedDay,
                'request_time_option_id' => $request_time_option->id,
                'created_by' => Auth::user()->id,
            ]);

        }

        // $time = Carbon::createFromFormat('H:i', $this->time)->format('h:i A');
        ActivityLogs::create([
            'log_action' => "Request time option for days \"".$day_text."\" updated  " ,
            'log_user' => Auth::user()->name,
            'created_by' => Auth::user()->id,
        ]);



        session()->flash('success','Request time option updated successfully');

        return redirect()->route('request_time_options.index');

    }




    public function render()
    {
        return view('livewire.admin.request-time-option.request-time-option-edit');
    }
}
