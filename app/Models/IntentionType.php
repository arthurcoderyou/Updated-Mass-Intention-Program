<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntentionType extends Model
{
    use HasFactory;


    protected $table = "intention_types";

    protected $fillable = [
        'name',
        'status',
        'created_by'
    ];



}
