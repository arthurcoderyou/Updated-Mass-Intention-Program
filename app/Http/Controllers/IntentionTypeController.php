<?php

namespace App\Http\Controllers;

use App\Models\IntentionType;
use Illuminate\Http\Request;

class IntentionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('intention_type.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('intention_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $intention_type = IntentionType::findOrFail($id);
        $intention_type_id = $intention_type->id;
        return view('intention_type.edit',[
            'intention_type_id' => $intention_type_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
