<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $table = "days";

    protected $fillable = [
        'name'
    ];



    //get all connected RequestTimeOptionDays
    public function request_time_options_days(){
        return $this->hasMany(RequestTimeOptionDays::class, 'day_id', 'id');
    }


}
