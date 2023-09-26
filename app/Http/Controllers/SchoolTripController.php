<?php

namespace App\Http\Controllers;

use App\Models\SchoolTrip;
use Illuminate\Http\Request;

class SchoolTripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schooltrips = SchoolTrip::paginate(6);
        return response()->json(['school trips' => $schooltrips]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'chaperone' => 'required', 
            'schoollocation' => 'required', 
            'cost' => 'required', 
            'comments' => 'required'
        ]);

        SchoolTrip::create($request->all());

        return response()->json('school trips data create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $schooltrips = SchoolTrip::find($id);
        return response()->json(['school trip data'=> $schooltrips]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'chaperone' => 'required', 
            'schoollocation' => 'required', 
            'cost' => 'required', 
            'comments' => 'required'
        ]);

        $schooltrip = SchoolTrip::find($id);
        $schooltrip->chaperone = $request->chaperone;
        $schooltrip->schoollocation = $request->schoollocation;
        $schooltrip->cost = $request->cost;
        $schooltrip->comments = $request->comments;
        $schooltrip->update();

        return response()->json('school trip data updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schooltrip = SchoolTrip::find($id);
        $schooltrip->delete();
        return response()->json('school trip data deleted');
    }
}
