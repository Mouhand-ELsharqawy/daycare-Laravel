<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Children;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $childs = Child::join('childrens','children.childrens_id','=','childrens.id')
        ->select('childrens.name', 'childrens.gender', 'childrens.dob', 'childrens.class',
         'childrens.currentlocation','children.nappinghours', 'children.food', 'children.extrainfo',
          'children.behavior', 'children.playinglocation', 'children.vaccine')
        ->paginate(6);
        return response()->json(['childs'=>$childs]); 
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
            'children'=>'required',
            'hours' => 'required', 
            'food' => 'required', 
            'info' => 'required', 
            'behavior' => 'required', 
            'location' => 'required', 
            'vaccine' => 'required'
        ]);

        $childrenId = Children::where('childrens.name',$request->children)->first()->id;
        

        Child::create([
            'childrens_id' => $childrenId, 
            'nappinghours' => $request->hours, 
            'food' => $request->food, 
            'extrainfo' => $request->info, 
            'behavior' => $request->behavior, 
            'playinglocation' => $request->location, 
            'vaccine' => $request->vaccine
        ]);
        return response()->json('child created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $child = Child::join('childrens','children.childrens_id','=','childrens.id')
        ->select('childrens.name', 'childrens.gender', 'childrens.dob', 'childrens.class', 'childrens.currentlocation','children.napping-hours', 'children.food', 'children.extra-info', 'children.behavior', 'children.playing-location', 'children.vaccine')
        ->where('children.id',$id)
        ->get();

        return response()->json(['child'=>$child]);
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
            'hours' => 'required', 
            'food' => 'required', 
            'info' => 'required', 
            'behavior' => 'required', 
            'location' => 'required', 
            'vaccine' => 'required'
        ]);

        $childrenId = Children::where('childrens.name','=',$request->children)->first()->id;
        $child = Child::find($id);
        $child->childrens_id = $childrenId; 
        $child->nappinghours = $request->hours; 
        $child->food = $request->food;
        $child->extrainfo = $request->info; 
        $child->behavior = $request->behavior; 
        $child->playinglocation = $request->location; 
        $child->vaccine = $request->vaccine;
        $child->update();
        return response()->json('child updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $child = Child::find($id);
        $child->delete();
        return response()->json('child deleted');
    }
}
