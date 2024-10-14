<?php

namespace App\Http\Controllers;

use App\Models\RequestTimeOption;
use Illuminate\Http\Request;

class RequestTimeOptionController extends Controller
{
    //list
    public function index(){
        return view('request-time-option.index');
    }


    //edit
    public function edit($id){
        $request_time_option = RequestTimeOption::findOrFail($id);
        $request_time_option_id = $request_time_option->id;
        return view('request-time-option.edit',[
            'request_time_option_id' => $request_time_option_id
        ]);
    }


}
