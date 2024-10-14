<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityLogsController extends Controller
{
    //index
    public function index(){
        return view('activity-logs.index');
    }


}
