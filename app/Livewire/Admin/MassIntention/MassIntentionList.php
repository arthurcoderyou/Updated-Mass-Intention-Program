<?php

namespace App\Livewire\Admin\MassIntention;

use Livewire\Component;
use App\Models\ActivityLogs;
use App\Models\Day;
use Livewire\WithPagination;
use App\Models\IntentionType;
use App\Models\MassIntention;
use Illuminate\Support\Facades\Auth;

class MassIntentionList extends Component
{
    use WithPagination;
    // public $roles;

    public $search = '';
    public $sort_by = '';
    public $record_count = 10;

    public $intention_types = [];
    public $selected_intention_types = [];
    public $selected_intention_types_count = 0;
    public $start_date;
    public $end_date;

    public $status = [];


    public $days_of_the_week = [];
    public $selected_days_of_the_week = [];
    public $selected_days_of_the_week_count = 0;


    public function deleteMassIntention($mass_intention_id){
        $mass_intention = MassIntention::find($mass_intention_id);

        // //delete the connected records
        // if(!empty($mass_intention->time_options)){
        //     foreach($mass_intention->time_options as $option){
        //         $option->delete();
        //     }
        // }

        // //delete the record
        // $mass_intention->delete();

        $mass_intention->status = 0; //status for deleting mass_intention
        $mass_intention->save();

        ActivityLogs::create([
            'log_action' => "Mass intention for \"".$mass_intention->intention_name."\" deleted by ".Auth::user()->name,
            'log_user' => Auth::user()->name,
            'created_by' => Auth::user()->id,
        ]);


        session()->flash('success','Mass intention deleted successfully');
        return redirect()->route('mass_intentions.index');

    }

    public function mount(){
        // $this->roles = Role::get();

        //get intention types
        $this->intention_types = IntentionType::where('status',1)->get();
        $this->days_of_the_week = Day::all();

        // Check if this is the first time the component is loaded
        $this->reloadPage();
    }

    // Function to reload the page
    public function reloadPage()
    {
        if (!session()->has('pageReloaded')) {
            // Reload the page only once by setting a session value
            session()->put('pageReloaded', true);
            return redirect()->route(request()->route()->getName()); // Use the current route name to reload the same route
        }
    }

    // Method to select/deselect all checkboxes
    public function selectAll($value)
    {
        if ($value) {
            // Select all within the module
            $this->selected_intention_types = IntentionType::where('status',1)->pluck('id')->toArray();
            $this->selected_intention_types_count = count($this->selected_intention_types);
        }else{
            $this->selected_intention_types = [];
            $this->selected_intention_types_count = count($this->selected_intention_types);
        }
    }


    // Method to select/deselect all checkboxes in the days
    public function selectAllDays($value)
    {
        if ($value) {

            $this->selected_days_of_the_week = Day::pluck('id')->toArray();
            $this->selected_days_of_the_week_count = count($this->selected_days_of_the_week);


        }else{
            $this->selected_days_of_the_week = [];
            $this->selected_days_of_the_week_count = count($this->selected_days_of_the_week);
        }
    }



    public function render()
    {
        $mass_intentions = MassIntention::select('mass_intentions.*')
            ->where('status',1) // 1 is the status of active
            ;
            // ->where('status',0);
            if(!empty($this->search)){
                $mass_intentions = $mass_intentions->where(function($query) {
                    $query->where('contact_name','like' ,'%'.$this->search.'%')
                    ->orWhere('contact_info','like' ,'%'.$this->search.'%')
                    ->orWhere('intention_name','like' ,'%'.$this->search.'%')
                    ->orWhere('intention_notes','like' ,'%'.$this->search.'%');
                });
                // ->orWhere('duration',$this->search)
                // ->orWhere('duration_type','like' ,'%'.$this->search.'%')

            }


            if (!empty($this->selected_intention_types) && is_array($this->selected_intention_types)) {

                // dd($this->selected_intention_types);
                $mass_intentions = $mass_intentions->whereIn('intention_type', $this->selected_intention_types);
                $this->selected_intention_types_count = count($this->selected_intention_types);
            }


            // Filter by selected days of the week
            if (!empty($this->selected_days_of_the_week) && is_array($this->selected_days_of_the_week)) {
                $mass_intentions = $mass_intentions->whereHas('time_options.request_time_option.days', function ($query) {
                    $query->whereIn('day_id', $this->selected_days_of_the_week);
                });
            }




            if ($this->start_date && $this->end_date) {
                // $mass_intentions->where('start_date', '>=', $this->start_date)
                //       ->where('end_date', '<=', $this->end_date);

                    // Checking for overlapping date ranges
                $mass_intentions->where(function($query) {
                    $query->where('start_date', '<=', $this->end_date)
                        ->where('end_date', '>=', $this->start_date);
                });

            }

            if ($this->start_date ) {
                // $mass_intentions->where('start_date', '>=', $this->start_date)
                //       ->where('end_date', '<=', $this->end_date);

                    // Checking for overlapping date ranges
                $mass_intentions->where(function($query) {
                    $query->where('end_date', '>=', $this->start_date);
                });

            }


            if ( $this->end_date) {
                // $mass_intentions->where('start_date', '>=', $this->start_date)
                //       ->where('end_date', '<=', $this->end_date);

                    // Checking for overlapping date ranges
                $mass_intentions->where(function($query) {
                    $query->where('start_date', '<=', $this->end_date);
                });

            }



        if(!empty($this->sort_by)){

            switch($this->sort_by){
                case "priority_desc":
                    $mass_intentions =  $mass_intentions->orderBy('priority','ASC');
                    break;

                case "priority_asc":
                    $mass_intentions =  $mass_intentions->orderBy('priority','DESC');
                    break;

                case "intention_name_asc":
                    $mass_intentions =  $mass_intentions->orderBy('intention_name','ASC');
                    break;

                case "intention_name_desc":
                    $mass_intentions =  $mass_intentions->orderBy('intention_name','DESC');
                    break;

                case "created_asc":
                    $mass_intentions =  $mass_intentions->orderBy('created_at','ASC');
                    break;

                case "created_desc":
                    $mass_intentions =  $mass_intentions->orderBy('created_at','DESC');
                    break;

                case "updated_asc":
                    $mass_intentions =  $mass_intentions->orderBy('updated_at','ASC');
                    break;

                case "updated_desc":
                    $mass_intentions =  $mass_intentions->orderBy('updated_at','DESC');
                    break;

            }


        }else{
            $mass_intentions =  $mass_intentions->orderBy('updated_at','DESC');

        }





        $mass_intentions = $mass_intentions->paginate($this->record_count);


        return view('livewire.admin.mass-intention.mass-intention-list',[
            'mass_intentions' => $mass_intentions,
        ]);




    }


}
