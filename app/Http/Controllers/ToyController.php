<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Toy;
use Illuminate\Http\Request;

class ToyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toys = Toy::join('programs','toys.programs_id','=','programs.id')
        ->select('programs.programname', 'programs.departmentphone','toys.name', 'toys.cost', 'toys.manufacturer', 'toys.purchasedate')
        ->paginate(6);

        return response()->json(['toys'=>$toys]);
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
            'name' => 'required', 
            'cost' => 'required', 
            'manufacturer' => 'required', 
            'purchasedate' => 'required', 
            'program' => 'required'
        ]);

        $programId = Program::where('programs.programname',$request->program)->first()->id;

        toy::create([
            'name' => $request->name, 
            'cost' => $request->cost, 
            'manufacturer' => $request->manufacturer, 
            'purchasedate' => $request->purchasedate, 
            'programs_id' => $programId
        ]);

        return response()->json('toy data created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $toy = Toy::join('programs','toys.programs_id','=','programs.id')
        ->select('programs.programname', 'programs.departmentphone','toys.name', 'toys.cost', 'toys.manufacturer', 'toys.purchasedate')
        ->where('toys.id',$id)
        ->get();

        return response()->json(['toy'=>$toy]);
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
            'name' => 'required', 
            'cost' => 'required', 
            'manufacturer' => 'required', 
            'purchasedate' => 'required', 
            'program' => 'required'
        ]);

        $programId = Program::where('programs.programname',$request->program)->first()->id;

        $toy = Toy::find($id);

        $toy->name = $request->name;
        $toy->cost = $request->cost;
        $toy->manufacturer = $request->manufacturer;
        $toy->purchasedate = $request->purchasedate;
        $toy->programs_id = $programId;
        $toy->update();
        return response()->json('toy data updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $toy = Toy::find($id);
        $toy->delete();
        return response()->json('toy data deleted');
    }
}
