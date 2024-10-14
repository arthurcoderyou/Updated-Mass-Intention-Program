<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTimeOption extends Model
{
    use HasFactory;

    protected $table = "request_time_options";

    protected $fillable = [
        'time',
        'status',
        // 'day',
        'created_by'
    ];

    /**
     * Define the relationship with the Day model.
     * One RequestTimeOption can have many Days.
     */
    public function days()
    {
        return $this->hasMany(RequestTimeOptionDays::class, 'request_time_option_id', 'id');
    }


    public function filterDaysByIds(array $dayIds)
    {

        if(!empty($dayIds) && count($dayIds) > 0){
            // Filter the days that are in the provided array of IDs
            return $this->days()->whereIn('day_id', $dayIds)->get();
        }else{
            return $this->days();
        }

    }



    //get the connection on MassIntentionRequestTimeOption
    public function mass_intention_request_time_options(){
        return $this->hasMany(RequestTimeOptionDays::class, 'request_time_option_id', 'id');
    }



    static public function getTimeRecords($day_id = 0){

        $return = RequestTimeOption::select('request_time_options.*')
            ->leftJoin('request_time_option_days','request_time_option_days.request_time_option_id','=','request_time_options.id')
            ->where('request_time_option_days.day_id','=',$day_id)
            ->orderBy('request_time_options.time','ASC')
            ->get();

        return $return;

    }

    static public function getTimeRecordsBySelectedId($request_time_option_id = 0,$day_id = 0){

        $return = RequestTimeOption::select('request_time_options.*')
            ->leftJoin('request_time_option_days','request_time_option_days.request_time_option_id','=','request_time_options.id')
            ->where('request_time_option_days.day_id','=',$day_id)
            ->where('request_time_options.id','=',$request_time_option_id)
            ->orderBy('request_time_options.time','ASC')
            ->get();

        return $return;

    }



}



