<?php

namespace App\Livewire\Admin\MassIntention;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\ActivityLogs;
use App\Models\IntentionType;
use App\Models\MassIntention;
use App\Models\MassIntentionRequestTimeOption;
use App\Models\RequestTimeOption;
use Illuminate\Support\Facades\Auth;

class MassIntentionEdit extends Component
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

    public $mass_intention_id;

    public $selected_request_time_options = [];

    //for the other_intention_type
    public $other_intention_type;


    public function mount($mass_intention_id){
        // dd($mass_intention_id);
        $mass_intention = MassIntention::findOrFail($mass_intention_id);

        $this->mass_intention_id = $mass_intention->id;

        $this->contact_name = $mass_intention->contact_name;
        $this->contact_info = $mass_intention->contact_info;
        $this->intention_name = $mass_intention->intention_name;
        $this->intention_type = $mass_intention->intention_type;
        $this->priority = $mass_intention->priority;
        $this->duration = $mass_intention->duration;
        $this->duration_type = $mass_intention->duration_type;
        $this->intention_notes = $mass_intention->intention_notes;

        $this->start_date = $mass_intention->start_date;
        $this->end_date =  Carbon::parse($mass_intention->end_date)->format('d/m/Y');


        $this->intention_types = IntentionType::where('status',1)->get();
        $this->duration_types = ['day','week','month','year'];

        //get request_time_options || the options of DAY & TIME options
        $this->request_time_options = RequestTimeOption::where('status',1)->orderBy('time','ASC')->get();


        // Select all within the module
        $this->selected_request_time_options = $mass_intention->time_options->pluck('time_option_id')->toArray();


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

            'intention_type' => ['required'  ],
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
        $this->validate([
            'contact_name' => ['required', 'string', ],
            'contact_info' => ['required', 'string', ],

            'intention_name' => ['required', 'string', ],

            'intention_type' => ['required'  ],
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
                    if (empty($this->intention_type) && empty($this->other_intention_type)) {
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

        // dd($mass_intention_id);
        $mass_intention = MassIntention::findOrFail($this->mass_intention_id);

        //updated

        $mass_intention->contact_name = $this->contact_name;
        $mass_intention->contact_info = $this->contact_info;

        $mass_intention->intention_name = $this->intention_name;

        $mass_intention->intention_type = $intention_type_id;
        $mass_intention->priority = $this->priority;
        $mass_intention->status = $this->status;

        $mass_intention->start_date = $this->start_date;

        $mass_intention->end_date = Carbon::createFromFormat('d/m/Y', $this->end_date)->format('Y-m-d H:i:s');

        $mass_intention->duration = $this->duration;
        $mass_intention->duration_type = $this->duration_type;

        $mass_intention->intention_notes = $this->intention_notes;

        $mass_intention->save();

        //delete all records first of mass_intention_request_options
        $previuos_options = MassIntentionRequestTimeOption::where('mass_intention_id',$mass_intention->id)->get();
        if(!empty($previuos_options )){
            foreach($previuos_options as $option){
                $option->delete();
            }
        }



        //update new values for mass_intention_request_options
        if(!empty($this->selected_request_time_options) && count($this->selected_request_time_options) > 0){

            foreach($this->selected_request_time_options as $option_id){

                MassIntentionRequestTimeOption::create([
                    'mass_intention_id' => $mass_intention->id,
                    'time_option_id' => $option_id
                ]);

            }

        }

        ActivityLogs::create([
            'log_action' => "Mass intention \"".$this->intention_name."\" updated  " ,
            'log_user' => Auth::user()->name,
            'created_by' => Auth::user()->id,
        ]);



        session()->flash('success','Mass intentions updated successfully');

        return redirect()->route('mass_intentions.index');

    }

    public function render()
    {
        return view('livewire.admin.mass-intention.mass-intention-edit');
    }
}
