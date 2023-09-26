<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\MainOffice;
use Illuminate\Http\Request;

class MainOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mainoffices = MainOffice::join('employees','main_offices.employees_id','=','employees.id')
        ->select('employees.name')
        ->paginate(6);
        return response()->json(['Main Office'=>$mainoffices]);
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
            'employee'
        ]);

        $employeeId = Employee::where('employees.name',$request->employee)->first()->id;

        MainOffice::create([
            'employees_id'=> $employeeId
        ]);
        return response()->json('employee data created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mainoffice = MainOffice::find($id);
        return response()->json(['Main Office'=>$mainoffice]);
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
            'employee'
        ]);

        $employeeId = Employee::where('employees.name',$request->employee)->first()->id;

        $mainoffice = MainOffice::find($id);

        $mainoffice->employees_id = $employeeId;
        $mainoffice->update();

        return response()->json('employee data updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mainoffice = MainOffice::find($id);
        $mainoffice->delete();
        return response()->json('employee data deleted');
    }
}
