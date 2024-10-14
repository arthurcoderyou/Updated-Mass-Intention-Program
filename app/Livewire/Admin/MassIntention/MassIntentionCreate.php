<?php

namespace App\Livewire\Admin\MassIntention;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\ActivityLogs;
use App\Models\IntentionType;
use App\Models\MassIntention;
use App\Models\RequestTimeOption;
use Illuminate\Support\Facades\Auth;
use App\Models\RequestTimeOptionDays;
use App\Models\MassIntentionRequestTimeOption;

class MassIntentionCreate extends Component
{
    public $contact_name;
    public $contact_info;

    public $intention_name;

    public $intention_type;
    public $priority;
    public $status = 1; // active by default

    public $start_date;
    public $end_date;
    public $duration;
    public $duration_type;

    public $intention_notes;

    public $intention_types = [];
    public $duration_types = [];
    public $request_time_options = [];

    public $selected_request_time_options = [];


    //for the other_intention_type
    public $other_intention_type;

    public function mount(){
        //get intention types
        $this->intention_types = IntentionType::where('status',1)->get();

        //get request_time_options || the options of DAY & TIME options
        $this->request_time_options = RequestTimeOption::where('status',1)->orderBy('time','ASC')->get();

        $this->duration_types = ['day','week','month','year'];

        // $this->end_date = date(now(),"d/m/Y");

    }

    // Method to select/deselect all checkboxes
    public function selectAll($value)
    {
        if ($value) {
            // Select all within the module
            $this->selected_request_time_options = RequestTimeOption::where('status',1)->pluck('id')->toArray();
        }else{
            $this->selected_request_time_options = [];
        }
    }

    public function updated($fields){

        // $this->calculateEndDate();



        $this->validateOnly($fields,[
            'contact_name' => ['required', 'string', ],
            'contact_info' => ['required', 'string', ],

            'intention_name' => ['required', 'string', ],
            'priority' => ['nullable', ],
            'status' => ['required' ],
            'start_date' => ['required', 'date', ],
            // 'end_date' => ['required' ],
            'duration' => ['required'],
            'duration_type' => ['required' ],

           'intention_notes' => ['nullable', 'string', ],
           'selected_request_time_options' => 'required|array|min:1', // Ensure it's an array with at least one selection

           'intention_type' => [
                function($attribute, $value, $fail) {
                    if (empty($this->intention_type) &&  empty($this->other_intention_type)) {
                        $fail('Intention type is required');
                    }
                }
            ],
            'other_intention_type' => ['nullable', 'unique:intention_types,name'],

        ],[
            'selected_request_time_options.required' => 'The request time options field is required',
            'other_intention_type.unique' => 'The other intention type name already exists '
        ]);





    }



    public function calculateEndDate()
    {
        if ($this->start_date && $this->duration && $this->duration_type) {
            $start = Carbon::parse($this->start_date);


            // Cast $this->duration to an integer
            $duration = (int) $this->duration;

            switch ($this->duration_type) {
                case 'day':
                    $this->end_date = $start->addDays($duration)->format('d/m/Y');
                    break;
                case 'week':
                    $this->end_date = $start->addWeeks($duration)->format('d/m/Y');

                    break;
                case 'month':
                    $this->end_date = $start->addMonths($duration)->format('d/m/Y');

                    break;
                case 'year':
                    $this->end_date = $start->addYears($duration)->format('d/m/Y');

                    break;
            }
            // dd($this->end_date); // Check if the method is being called and the value of $end_date
        }
    }



    public function save(){

        // dd($this->selected_request_time_options);

        $this->validate([
            'contact_name' => ['required', 'string', ],
            'contact_info' => ['required', 'string', ],

            'intention_name' => ['required', 'string', ],

            // 'intention_type' => ['required'  ],
            'priority' => ['nullable', ],
            'status' => ['required' ],
            'start_date' => ['required', 'date', ],
            // 'end_date' => ['required',   ],
            'duration' => ['required', 'int', ],
            'duration_type' => ['required' ],

            'intention_notes' => ['nullable', 'string', ],
            'selected_request_time_options' => 'required|array|min:1', // Ensure it's an array with at least one selection
            'intention_type' => [
                function($attribute, $value, $fail) {
                    if (empty($this->intention_type) &&  empty($this->other_intention_type)) {
                        $fail('Intention type is required');
                    }
                }
            ],
            'other_intention_type' => ['nullable', 'unique:intention_types,name'],


        ],[
            'selected_request_time_options.required' => 'The request time options field is required',
            'other_intention_type.unique' => 'The other intention type name already exists '
        ]);


        $intention_type_id = $this->intention_type;
        if($this->other_intention_type){
            $new_intention_type = IntentionType::create([
                'name' => $this->other_intention_type,
                'status' => 1, //enabled
                'created_by' => Auth::user()->id
            ]);

            $intention_type_id = $new_intention_type->id;
        }


        //save
        $mass_intention = MassIntention::create([

            'contact_name' => $this->contact_name,
            'contact_info' => $this->contact_info,

            'intention_name' => $this->intention_name,

            'intention_type' => $intention_type_id,
            'priority' => $this->priority,
            'status' => $this->status,

            'start_date' => $this->start_date,

            'end_date' => Carbon::createFromFormat('d/m/Y', $this->end_date)->format('Y-m-d H:i:s'),

            'duration' => $this->duration,
            'duration_type' => $this->duration_type,

            'intention_notes' => $this->intention_notes,

            'created_by' => Auth::user()->id,
        ]);



        if(!empty($this->selected_request_time_options) && count($this->selected_request_time_options) > 0){

            foreach($this->selected_request_time_options as $option_id){

                MassIntentionRequestTimeOption::create([
                    'mass_intention_id' => $mass_intention->id,
                    'time_option_id' => $option_id
                ]);

            }

        }


        ActivityLogs::create([
            'log_action' => "Mass intention \"".$this->intention_name."\" created  " ,
            'log_user' => Auth::user()->name,
            'created_by' => Auth::user()->id,
        ]);



        session()->flash('success','Mass intentions created successfully');

        return redirect()->route('mass_intentions.index');

    }


    public function render()
    {
        return view('livewire.admin.mass-intention.mass-intention-create');
    }
}
