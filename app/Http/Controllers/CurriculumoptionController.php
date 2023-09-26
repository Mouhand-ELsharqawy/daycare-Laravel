<?php

namespace App\Http\Controllers;

use App\Models\CurriculumOption;
use App\Models\Employee;
use Illuminate\Http\Request;

class CurriculumoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = CurriculumOption::join('employees','curriculum_options.employees_id','=','employees.id')
        ->select('employees.name','curriculum_options.season', 'curriculum_options.agegroup', 
        'curriculum_options.numberofdays', 'curriculum_options.hoursperweek', 
        'curriculum_options.description')
        ->paginate(6);
        return response()->json(['curriculum options'=>$options]);
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
            'season' => 'required', 
            'agegroup' => 'required', 
            'numberofdays' => 'required', 
            'hoursperweek' => 'required', 
            'description' => 'required'
        ]);

        $employeeId = Employee::where('employees.name',$request->employee)->first()->id;

        CurriculumOption::create([
            'employees_id' => $employeeId, 
            'season' => $request->season, 
            'agegroup' => $request->agegroup, 
            'numberofdays' => $request->numberofdays,
            'hoursperweek' => $request->hoursperweek, 
            'description' => $request->description
        ]);
        return response()->json('curriculum option data created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $option = CurriculumOption::join('employees','curriculum_options.employees_id','=','employees.id')
        ->select('employees.name','curriculum_options.season', 'curriculum_options.agegroup', 
        'curriculum_options.numberofdays', 'curriculum_options.hoursperweek', 
        'curriculum_options.description')
        ->where('curriculum_options.id',$id)
        ->get();
        return response()->json(['curriculum option'=>$option]);
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
            'season' => 'required', 
            'agegroup' => 'required', 
            'numberofdays' => 'required', 
            'hoursperweek' => 'required', 
            'description' => 'required'
        ]);

        $employeeId = Employee::where('employees.name',$request->employee)->first()->id;
        $option = CurriculumOption::find($id);
        $option->employees_id = $employeeId ;
        $option->season = $request->season;
        $option->agegroup = $request->agegroup; 
        $option->numberofdays = $request->numberofdays;
        $option->hoursperweek = $request->hoursperweek; 
        $option->description = $request->description;
        $option->update();
        return response()->json('curriculum option data updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $option = CurriculumOption::find($id);
        $option->delete();
        return response()->json('curriculum option data deleted');
    }
}
