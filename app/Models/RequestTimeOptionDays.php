<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTimeOptionDays extends Model
{
    use HasFactory;

    protected $table = "request_time_option_days";

    protected $fillable = [
        'day_id',
        'request_time_option_id',
        'created_by'
    ];

    public function day(){
        return $this->belongsTo(Day::class,'day_id','id');
    }

    public function request_time_option(){
        return $this->belongsTo(RequestTimeOption::class,'request_time_option_id','id');
    }

}
