<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use finfo;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(6);
        return response()->json(['employees' => $employees]);
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
            'address' => 'required', 
            'salary' => 'required', 
            'maritalstatus' => 'required', 
            'socialsecurity' => 'required', 
            'education' => 'required', 
            'startdate' => 'required', 
            'enddate' => 'required'
        ]);
        Employee::create($request->all());
        return response()->json('employee data created'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::find($id);
        return response()->json(['employees' => $employee]);
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
            'address' => 'required', 
            'salary' => 'required', 
            'maritalstatus' => 'required', 
            'socialsecurity' => 'required', 
            'education' => 'required', 
            'startdate' => 'required', 
            'enddate' => 'required'
        ]);
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->address = $request->address;
        $employee->salary = $request->salary;
        $employee->maritalstatus = $request->maritalstatus;
        $employee->socialsecurity = $request->socialsecurity;
        $employee->education = $employee->education;
        $employee->startdate = $request->startdate;
        $employee->enddate = $request->enddate;
        $employee->update();
        return response()->json('employee data updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return response()->json('employee data deleted');
    }
}
