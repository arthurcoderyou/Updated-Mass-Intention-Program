<?php

namespace App\Livewire\Admin\Report;

use Carbon\Carbon;
use App\Models\Day;
use App\Models\User;
// use Barryvdh\DomPDF\PDF;
use Livewire\Component;
use App\Models\ActivityLogs;
use Livewire\WithPagination;
use App\Models\IntentionType;
use App\Models\MassIntention;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\MassIntentionPriority;
// use Spatie\Browsershot\Browsershot;
// use Dompdf\Dompdf;


class Report extends Component
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

    public $mass_intentions_list = [];
    public $users;

    public $priority; // Bound to the input field
    // public $next_priority;


    public $print_type;

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

        // Set current date in 'Y-m-d' format for the date input fields
        $this->start_date = now()->format('Y-m-d');
        $this->end_date = now()->format('Y-m-d');

        $this->sort_by = "intention_name_asc";

        $this->print_type = "list";


        $this->selected_intention_types = IntentionType::where('status',1)->pluck('id')->toArray();
        $this->selected_days_of_the_week[] = Carbon::now()->dayOfWeek + 1; // + 1 because  the index in carbon starts from 0


        // $next =  MassIntention::getNextPriority();
        // $this->next_priority = MassIntention::getNextPriority();



        // dd($this->next_priority);
    }



    // Method to select/deselect all checkboxes
    public function selectAll(int $value)
    {
        if ( $value) {
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
    public function generatePdfBACKUP(int $request_time_option_id = 0, int $day_id = 0)
    {
        $data = [
            'day_id' => $day_id,
            'request_time_option_id' => $request_time_option_id,
            'days_of_the_week' => $this->days_of_the_week,
            'intention_types' => $this->intention_types,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'selected_intention_types' => $this->selected_intention_types,
            'selected_days_of_the_week' => $this->selected_days_of_the_week,
            'sort_by' => $this->sort_by,
            'search' => $this->search,
            'print_type' => $this->print_type,
        ];

        // Generate PDF using a view
        $pdf = Pdf::loadView('report.report', $data);

        // Set metadata for the PDF document
        $options = $pdf->getDomPDF()->getOptions();
        $options->set('isHtml5ParserEnabled', true); // Optional: Enable HTML5 parsing
        $options->set('isRemoteEnabled', true);      // Optional: Enable loading of external resources
        $pdf_title = 'Mass_Intention_Report_' . date("d_m_Y_h_i_A", strtotime(now())) . '.pdf';
        // Set the document title, author, and other metadata
        $pdf->getDomPDF()->getCanvas()->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) use ($pdf_title) {

            // Set metadata using the correct format
            $canvas->get_cpdf()->metadata['Title'] = $pdf_title;
            $canvas->get_cpdf()->metadata['Author'] = Auth::user()->name;
            $canvas->get_cpdf()->metadata['Subject'] = 'Mass Intention Report for AganaCathedral';
            $canvas->get_cpdf()->metadata['Keywords'] = 'Mass Intention Report, PDF, AganaCathedral';
        });

        // Return the PDF for viewing in the browser
        return response($pdf->stream(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . $pdf_title . '"');
    }


    public function generatePdf(int $request_time_option_id = 0,int $day_id = 0){


        $data = [
            'day_id' => $day_id,
            'request_time_option_id' => $request_time_option_id,
            'days_of_the_week'  =>  $this->days_of_the_week,
            'intention_types' =>     $this->intention_types,
            'start_date'   =>   $this->start_date,
            'end_date'  =>  $this->end_date,

            'selected_intention_types'    =>   $this->selected_intention_types,
            'selected_days_of_the_week'      => $this->selected_days_of_the_week,
            'sort_by' => $this->sort_by,
            'search' => $this->search,
            'print_type' => $this->print_type,
        ];

        // Generate PDF using a view
        // $pdf = Pdf::loadView('report.users', $data);
        $pdf = Pdf::loadView('report.report', $data);

        $pdf_title = 'Mass_Intention_Report_'.date("d_m_Y h_i_A",strtotime(now())).'.pdf';

        // Set metadata for the PDF document
        $options = $pdf->getDomPDF()->getOptions();
        $options->set('isHtml5ParserEnabled', true); // Optional: Enable HTML5 parsing
        $options->set('isRemoteEnabled', true);      // Optional: Enable loading of external resources

        // Set the document title, author, and other metadata
        $pdf->getDomPDF()->getCanvas()->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) {

            $pdf_title = 'Mass_Intention_Report_'.date("d_m_Y h_i_A",strtotime(now())).'.pdf';
            // Set metadata using the correct format
            $canvas->get_cpdf()->metadata['Title'] = $pdf_title;
            $canvas->get_cpdf()->metadata['Author'] = Auth::user()->name;
            $canvas->get_cpdf()->metadata['Subject'] = 'Mass Intention Report for AganaCathedral';
            $canvas->get_cpdf()->metadata['Keywords'] = 'Mass Intention Report, PDF, AganaCathedral';
        });




        // // // // Return the PDF as a download or inline view
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, $pdf_title);







    }


    public function generatePdfPerRequestTimeOption($request_time_option_id){


        $data = [
            'days_of_the_week'  =>  $this->days_of_the_week,
            'intention_types' =>     $this->intention_types,
            'start_date'   =>   $this->start_date,
            'end_date'  =>  $this->end_date,

            'selected_intention_types'    =>   $this->selected_intention_types,
            'selected_days_of_the_week'      => $this->selected_days_of_the_week,
            'sort_by' => $this->sort_by,
            'search' => $this->search,
        ];

        // Generate PDF using a view
        // $pdf = Pdf::loadView('report.users', $data);
        $pdf = Pdf::loadView('report.report', $data);

        $pdf_title = 'Mass_Intention_Report_'.date("d_m_Y h_i_A",strtotime(now())).'.pdf';

        // Set metadata for the PDF document
        $options = $pdf->getDomPDF()->getOptions();
        $options->set('isHtml5ParserEnabled', true); // Optional: Enable HTML5 parsing
        $options->set('isRemoteEnabled', true);      // Optional: Enable loading of external resources

        // Set the document title, author, and other metadata
        $pdf->getDomPDF()->getCanvas()->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) {

            $pdf_title = 'Mass_Intention_Report_'.date("d_m_Y h_i_A",strtotime(now())).'.pdf';
            // Set metadata using the correct format
            $canvas->get_cpdf()->metadata['Title'] = $pdf_title;
            $canvas->get_cpdf()->metadata['Author'] = Auth::user()->name;
            $canvas->get_cpdf()->metadata['Subject'] = 'Mass Intention Report for AganaCathedral';
            $canvas->get_cpdf()->metadata['Keywords'] = 'Mass Intention Report, PDF, AganaCathedral';
        });




        // Return the PDF as a download or inline view
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, $pdf_title);



        $mass_intentions = $mass_intentions->get();



    }

    // This method will be called when the input changes, and the MassIntention ID will be passed
    public function updatePriority(int $massIntentionId,int $priority_value,int $intention_id, int $request_time_option_id, $direction = null)
    {
        // dd($priority_value);

        // Validate the priority input
        if (!is_numeric($priority_value)) {
            session()->flash('error', 'Invalid priority value.');
            return;
        }
        // Find the mass intention record by its ID
        $massIntention = MassIntention::find($massIntentionId);

        //for not removing the priority
        if($priority_value != 0){



            if(!empty($direction)){


                if($direction == "move_up"){


                    //find mass intention on the target value
                    // $prev_mass_intention = MassIntention::where('priority',$priority_value)->where('intention_type',$intention_id)->first();
                    // $prev_mass_intention->priority = $priority_value + 1;
                    // $prev_mass_intention->save();


                    // $massIntention->priority = $priority_value;
                    // $massIntention->save();


                    $prev_massIntention_priority = MassIntentionPriority::where('priority',$priority_value)
                        // ->where('mass_intention_id', $massIntentionId)
                        ->where('intention_type_id', $intention_id)
                        ->where('request_time_option_id', $request_time_option_id)
                        ->first();

                    $prev_massIntention_priority->priority = $priority_value + 1;
                    $prev_massIntention_priority->save();

                    //check for existing records
                    $massIntention_priority = MassIntentionPriority::where('intention_type_id', $intention_id)

                        ->where('mass_intention_id', $massIntentionId)
                        ->where('request_time_option_id', $request_time_option_id)
                        ->first();

                    $massIntention_priority->priority = $priority_value;
                    $massIntention_priority->save();



                }else if($direction == "move_down"){


                    //find mass intention on the target value
                    // $prev_mass_intention = MassIntention::where('priority',$priority_value)->where('intention_type',$intention_id)->first();
                    // $prev_mass_intention->priority = $priority_value - 1;
                    // $prev_mass_intention->save();


                    // $massIntention->priority = $priority_value;
                    // $massIntention->save();

                    $prev_massIntention_priority = MassIntentionPriority::where('priority',$priority_value)
                        // ->where('mass_intention_id', $massIntentionId)
                        ->where('intention_type_id', $intention_id)
                        ->where('request_time_option_id', $request_time_option_id)
                        ->first();

                    $prev_massIntention_priority->priority = $priority_value - 1;
                    $prev_massIntention_priority->save();

                    //check for existing records
                    $massIntention_priority = MassIntentionPriority::where('mass_intention_id', $massIntentionId)
                        ->where('intention_type_id', $intention_id)
                        ->where('request_time_option_id', $request_time_option_id)
                        ->first();

                    $massIntention_priority->priority = $priority_value;
                    $massIntention_priority->save();


                }





            }else{ // for new priorities
                if ($massIntention) {
                    // // Update the priority_id of the record
                    // $massIntention->priority = $priority_value;
                    // $massIntention->save();

                    //check for existing records
                    $massIntention_priority = MassIntentionPriority::getPriority($massIntention->id,$intention_id, $request_time_option_id );

                    if(!empty($massIntention_priority)){
                        $massIntention_priority->priority = $priority_value;
                        $massIntention_priority->save();
                    }else{
                        $massIntention_priority = new MassIntentionPriority();
                        $massIntention_priority->mass_intention_id = $massIntention->id;
                        $massIntention_priority->intention_type_id = $intention_id;
                        $massIntention_priority->request_time_option_id = $request_time_option_id ;
                        $massIntention_priority->priority = $priority_value;
                        $massIntention_priority->save();


                    }


                    // Optionally, display a success message
                    session()->flash('message', 'Priority updated successfully!');




                } else {
                    // Handle the case where the record isn't found
                    session()->flash('error', 'Mass intention not found.');
                }
            }




        }else{


            // //removing the priority and realigning the priority values
            // $removed_mass_intention = MassIntention::find($massIntentionId);
            // $removed_mass_intention->priority = 0;
            // $removed_mass_intention->save();


            //check for existing records
            $massIntention_priority = MassIntentionPriority::getPriority($massIntention->id,$intention_id, $request_time_option_id );
            $massIntention_priority->priority = 0;
            $massIntention_priority->save();

            // Optionally, display a success message
            session()->flash('message', 'Priority removed successfully!');


            $priority_mass_intentions = MassIntentionPriority::whereNotNull('priority')->where('priority','>',0)
                ->where('request_time_option_id',$request_time_option_id)
                ->where('intention_type_id',$intention_id)
                ->orderBy('priority','ASC')->get();

            $ids = [];

            $i = 1;
            foreach($priority_mass_intentions as $mass_intention){

                $ids[$mass_intention->id]   = $i;

                $i++;

            }

            //update mass_intentions
            foreach($ids as $intention_id => $value){
                $mass_intention_priority = MassIntentionPriority::find($intention_id);

                $mass_intention_priority->priority = $value;

                $mass_intention_priority->save();
            }



            // $priority_mass_intentions = MassIntention::whereNotNull('priority')->where('priority','>',0)->where('intention_type',$intention_id)->orderBy('priority','ASC')->get();

            // $ids = [];

            // $i = 1;
            // foreach($priority_mass_intentions as $mass_intention){

            //     $ids[$mass_intention->id]   = $i;

            //     $i++;

            // }

            // //update mass_intentions
            // foreach($ids as $intention_id => $value){
            //     $mass_intention = MassIntention::find($intention_id);

            //     $mass_intention->priority = $value;

            //     $mass_intention->save();
            // }




        }




        // Redirect back to the current route (reload the page)
        // return redirect()->route('dashboard'); // Replace 'current.route' with the actual route name



    }


    public function render()
    {




        return view('livewire.admin.report.report');
    }






}
