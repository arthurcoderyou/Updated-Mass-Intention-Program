<?php

namespace App\Models;

use Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MassIntention extends Model
{
    use HasFactory;

    protected $table = "mass_intentions";

    protected $fillable = [
        'contact_name',
        'contact_info',

        'intention_name',

        'intention_type',
        'priority',
        'status',

        'start_date',
        'end_date',
        'duration',
        'duration_type',

        'intention_notes',

        'created_by',

    ];


    public function type(){
        return $this->belongsTo(IntentionType::class,'intention_type','id');
    }

    public function time_options(){
        return $this->hasMany(MassIntentionRequestTimeOption::class,'mass_intention_id','id');
    }


    static public function getRecords($intention_type = 0,$request_time_options_id = 0, $record_count = 10, array $selected_days = [],array $selected_intention_types = [],$sort_by = null,$search = null, $start_date = null, $end_date = null, $priority = null){

        $return = MassIntention::select('mass_intentions.*','mass_intention_priorities.priority as mass_intention_priority')
            ->leftJoin('mass_intention_request_time_options','mass_intention_request_time_options.mass_intention_id','=','mass_intentions.id')
            ->leftJoin('request_time_options','request_time_options.id','=','mass_intention_request_time_options.time_option_id')
            ->leftJoin('request_time_option_days','request_time_option_days.request_time_option_id','=','request_time_options.id')
            ->leftJoin('mass_intention_priorities','mass_intention_priorities.mass_intention_id','=','mass_intentions.id')
            ->where('mass_intentions.status',1);
            // ->distinct();  // Ensure we only get unique records

            if( !empty($search) ){
                $return = $return->where( function($query) use ($search) {
                    $query->where('mass_intentions.contact_name','like' ,'%'.$search.'%')
                        ->orWhere('mass_intentions.contact_info','like' ,'%'.$search.'%')
                        ->orWhere('mass_intentions.intention_name','like' ,'%'.$search.'%')
                        ->orWhere('mass_intentions.intention_notes','like' ,'%'.$search.'%');
                });


            }



        if ($start_date && $end_date) {
            // $mass_intentions->where('start_date', '>=', $start_date)
            //       ->where('end_date', '<=', $end_date);

                // Checking for overlapping date ranges
            $return->where(function($query) use ($start_date,$end_date ) {
                $query->where('start_date', '<=', $end_date)
                    ->where('end_date', '>=', $start_date);
            });

        }

        if ($start_date ) {
            // $mass_intentions->where('start_date', '>=', $start_date)
            //       ->where('end_date', '<=', $end_date);

                // Checking for overlapping date ranges
            $return->where(function($query)  use ($start_date) {
                $query->where('end_date', '>=', $start_date);
            });

        }


        if ( $end_date) {
            // $mass_intentions->where('start_date', '>=', $start_date)
            //       ->where('end_date', '<=', $end_date);

                // Checking for overlapping date ranges
            $return->where(function($query)use ($end_date) {
                $query->where('start_date', '<=', $end_date);
            });

        }


        if($priority){
            /**
             * PRIORITY_NOT_NULL
             * records with not null of more than 0 priority
             *
             * PRIORITY_NULL
             * records with null or 0 priority
             *
             *
             */
            // if($priority == "PRIORITY_NOT_NULL"){
            //     $return->where(function($query) use ($intention_type, $request_time_options_id)   {
            //         $query->where('mass_intention_priorities.intention_type_id' ,'=',$intention_type)
            //         ->where('mass_intention_priorities.request_time_option_id' ,'=',$request_time_options_id);
            //     });
            //     $return->where(function($query)   {
            //         $query->whereNotNull('mass_intention_priorities.priority')
            //             ->where('mass_intention_priorities.priority' ,'>',0);
            //     });
            // }

            // if($priority == "PRIORITY_NULL"){
            //     $return->where(function($query) use ($intention_type, $request_time_options_id)   {
            //         $query->where('mass_intention_priorities.intention_type_id' ,'=',$intention_type)
            //         ->where('mass_intention_priorities.request_time_option_id' ,'=',$request_time_options_id);
            //     });
            //     $return->where(function($query)   {
            //         $query->whereNull('mass_intention_priorities.priority')
            //             ->orWhere('mass_intention_priorities.priority' ,'=',0);
            //     });
            // }

            if ($priority == "PRIORITY_NOT_NULL") {
                // Ensure it is connected and has priority > 0
                $return->where(function ($query) use ($intention_type, $request_time_options_id) {
                    $query->where('mass_intention_priorities.intention_type_id', '=', $intention_type)
                        ->where('mass_intention_priorities.request_time_option_id', '=', $request_time_options_id)
                        ->whereNotNull('mass_intention_priorities.priority')
                        ->where('mass_intention_priorities.priority', '>', 0);
                });
            } elseif ($priority == "PRIORITY_NULL") {
                // Either no connected priority or priority is null or 0
                $return->where(function ($query) use ($intention_type, $request_time_options_id) {
                    $query->whereNull('mass_intention_priorities.priority')
                        ->orWhere('mass_intention_priorities.priority', '=', 0)
                        ->orWhere(function ($query) use ($intention_type, $request_time_options_id) {
                            $query->where('mass_intention_priorities.intention_type_id', '=', $intention_type)
                                ->where('mass_intention_priorities.request_time_option_id', '=', $request_time_options_id);
                        });
                });
            }



        }


        if($intention_type > 0){
            $return    = $return->where('mass_intentions.intention_type','=',$intention_type);

        }


        if($request_time_options_id > 0){
            $return    = $return->where('request_time_options.id','=',$request_time_options_id)
                ->where('request_time_options.status','=',1);
        }

        if(!empty($selected_days ) && count($selected_days ) > 0){

            $return = $return->whereIn('request_time_option_days.day_id',$selected_days);

        }

        if(!empty($selected_intention_types ) && count($selected_intention_types ) > 0){

            $return = $return->whereIn('mass_intentions.intention_type',$selected_intention_types);

        }






        if(!empty($sort_by)){

            switch($sort_by){
                case "priority_asc":
                    $return =  $return->orderBy('mass_intention_priorities.priority','ASC');
                    break;

                case "priority_desc":
                    $return =  $return->orderBy('mass_intention_priorities.priority','DESC');
                    break;

                case "intention_name_asc":
                    $return =  $return->orderBy('mass_intentions.intention_name','ASC');
                    break;

                case "intention_name_desc":
                    $return =  $return->orderBy('mass_intentions.intention_name','DESC');
                    break;

                case "created_asc":
                    $return =  $return->orderBy('mass_intentions.created_at','ASC');
                    break;

                case "created_desc":
                    $return =  $return->orderBy('mass_intentions.created_at','DESC');
                    break;

                case "updated_asc":
                    $return =  $return->orderBy('mass_intentions.updated_at','ASC');
                    break;

                case "updated_desc":
                    $return =  $return->orderBy('mass_intentions.updated_at','DESC');
                    break;

            }


        }else{

            if(request()->segment(1) == "dashboard"){
                $return =  $return->orderBy('mass_intentions.intention_name','ASC');
                // dd(request()->segment(1) == "dashboard");
            }else{


                $return =  $return->orderBy('mass_intentions.updated_at','DESC');

            }



        }

        if($record_count > 0){
            $return = $return->paginate($record_count);
        }else{
            $return = $return->get();
        }



        return $return;

    }


    //check count of mass_intentions that are connected in a request_time_option
    static public function getRecordCount($request_time_options_id = 0, array $selected_days = [],array $selected_intention_types = [],$search = null, $start_date = null, $end_date = null){

        $return = MassIntention::select('mass_intentions.*')
            ->leftJoin('mass_intention_request_time_options','mass_intention_request_time_options.mass_intention_id','=','mass_intentions.id')
            ->leftJoin('request_time_options','request_time_options.id','=','mass_intention_request_time_options.time_option_id')
            ->leftJoin('request_time_option_days','request_time_option_days.request_time_option_id','=','request_time_options.id')
            ->where('mass_intentions.status',1);

            if( !empty($search) ){
                $return = $return->where( function($query) use ($search) {
                    $query->where('mass_intentions.contact_name','like' ,'%'.$search.'%')
                        ->orWhere('mass_intentions.contact_info','like' ,'%'.$search.'%')
                        ->orWhere('mass_intentions.intention_name','like' ,'%'.$search.'%')
                        ->orWhere('mass_intentions.intention_notes','like' ,'%'.$search.'%');
                });


            }



        if ($start_date && $end_date) {
            // $mass_intentions->where('start_date', '>=', $start_date)
            //       ->where('end_date', '<=', $end_date);

                // Checking for overlapping date ranges
            $return->where(function($query) use ($start_date,$end_date ) {
                $query->where('start_date', '<=', $end_date)
                    ->where('end_date', '>=', $start_date);
            });

        }

        if ($start_date ) {
            // $mass_intentions->where('start_date', '>=', $start_date)
            //       ->where('end_date', '<=', $end_date);

                // Checking for overlapping date ranges
            $return->where(function($query)  use ($start_date) {
                $query->where('end_date', '>=', $start_date);
            });

        }


        if ( $end_date) {
            // $mass_intentions->where('start_date', '>=', $start_date)
            //       ->where('end_date', '<=', $end_date);

                // Checking for overlapping date ranges
            $return->where(function($query)use ($end_date) {
                $query->where('start_date', '<=', $end_date);
            });

        }




        if($request_time_options_id > 0){
            $return    = $return->where('request_time_options.id','=',$request_time_options_id)
                ->where('request_time_options.status','=',1);
        }

        if(!empty($selected_days ) && count($selected_days ) > 0){

            $return = $return->whereIn('request_time_option_days.day_id',$selected_days);

        }

        if(!empty($selected_intention_types ) && count($selected_intention_types ) > 0){

            $return = $return->whereIn('mass_intentions.intention_type',$selected_intention_types);

        }




            $return = $return->count();




        return $return;

    }



    public static function getNextPriority(int $intention_type_id)
    {
        // Get the maximum priority value from the MassIntention model
        $maxPriority = MassIntention::where('intention_type',$intention_type_id)
            ->max('priority');

        // If no priority exists, return 1, otherwise return the next priority value
        $nextPriority = $maxPriority ? $maxPriority + 1 : 1;

        return $nextPriority;
    }


}
