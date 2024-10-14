<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MassIntentionPriority extends Model
{
    use HasFactory;
    protected $table = "mass_intention_priorities";

    protected $fillable = [
        'mass_intention_id',
        'intention_type_id',
        'request_time_option_id',
        'priority'
    ];

    static public function getPriority($mass_intention_id, $intention_type_id, $request_time_option_id){
        return MassIntentionPriority::where('mass_intention_id', $mass_intention_id)
            ->where('intention_type_id', $intention_type_id)
            ->where('request_time_option_id', $request_time_option_id)
            ->first();

    }


    public static function getNextPriority(int $intention_type_id,int $request_time_option_id)
    {
        // Get the maximum priority value from the MassIntention model
        $maxPriority = MassIntentionPriority::where('intention_type_id',$intention_type_id)
            ->where('request_time_option_id',$request_time_option_id)
            ->max('priority');

        // If no priority exists, return 1, otherwise return the next priority value
        $nextPriority = $maxPriority ? $maxPriority + 1 : 1;

        return $nextPriority;
    }


}
