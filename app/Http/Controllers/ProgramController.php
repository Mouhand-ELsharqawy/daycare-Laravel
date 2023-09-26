<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::join('employees','programs.employees_id','=','employees.id')
        ->select('employees.name', 'programs.programname', 'programs.programdate', 'programs.departmentphone', 'programs.location')
        ->paginate(6);
        return response()->json(['programs'=>$programs]);
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
            'employee' => 'required', 
            'programname' =>'required', 
            'programdate' =>'required', 
            'departmentphone' =>'required', 
            'location' => 'required'
        ]);

        $employeeId = Employee::where('employees.name',$request->employee)->first()->id;

        Program::create([
            'employees_id' => $employeeId, 
            'programname' => $request->programname, 
            'programdate' => $request->programdate, 
            'departmentphone' => $request->departmentphone, 
            'location' => $request-> location
        ]); 
        return response()->json('program data created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $program = Program::join('employees','programs.employees_id','=','employees.id')
        ->select('employees.name', 'programs.programname', 'programs.programdate', 'programs.departmentphone', 'programs.location')
        ->where('programs.id',$id)
        ->get();
        return response()->json(['program' => $program]);
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
            'employee' => 'required', 
            'programname' =>'required', 
            'programdate' =>'required', 
            'departmentphone' =>'required', 
            'location' => 'required'
        ]);

        $employeeId = Employee::where('employees.name',$request->employee)->first()->id;

        $program = Program::find($id);
        $program->employees_id = $employeeId;
        $program->programname = $request->programname;
        $program->programdate = $request->programdate;
        $program->departmentphone = $request->departmentphone;
        $program->location = $request->location;
        $program->update();

        return response()->json('program data updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = Program::find($id);
        $program->delete();
        return response()->json('program data deleted');
        
    }
}
