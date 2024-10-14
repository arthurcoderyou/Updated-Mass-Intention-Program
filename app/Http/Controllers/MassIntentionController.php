<?php

namespace App\Http\Controllers;

use App\Models\MassIntention;
use Illuminate\Http\Request;

class MassIntentionController extends Controller
{
    //list
    public function index(){
        return view('mass_intention.index');
    }

    //create
    public function create(){
        return view('mass_intention.create');
    }

    //edit
    public function edit($mass_intention_id){
        $mass_intention = MassIntention::findOrFail($mass_intention_id);

        return view('mass_intention.edit',[
            'mass_intention_id' => $mass_intention->id
        ]);
    }


}
