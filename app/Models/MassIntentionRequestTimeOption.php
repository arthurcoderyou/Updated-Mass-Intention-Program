<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MassIntentionRequestTimeOption extends Model
{
    use HasFactory;


    protected $table = "mass_intention_request_time_options";

    protected $fillable = [
        'mass_intention_id',
        'time_option_id'
    ];


    public function request_time_option(){
        return $this->belongsTo(RequestTimeOption::class,'time_option_id','id');
    }
}
