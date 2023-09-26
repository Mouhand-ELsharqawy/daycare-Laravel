<?php

namespace App\Http\Controllers;

use App\Models\MainOffice;
use App\Models\MaleParent;
use Illuminate\Http\Request;

class MaleParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maleparents = MaleParent::paginate(6);
        return response()->json(['Male Parent'=>$maleparents]);
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
            'fathername' => 'required', 
            'fatherfamilyname' => 'required', 
            'fmobile' => 'required', 
            'ftelephone' => 'required', 
            'fpostcode' => 'required', 
            'faddress' => 'required'
        ]);

        MaleParent::create($request->all());

        return response()->json('male parent data created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mainoffice = MaleParent::find($id);
        return response()->json(['male parent data'=> $mainoffice]);
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
            'fathername' => 'required', 
            'fatherfamilyname' => 'required', 
            'fmobile' => 'required', 
            'ftelephone' => 'required', 
            'fpostcode' => 'required', 
            'faddress' => 'required'
        ]);

        $mainoffice = MaleParent::find($id);
        $mainoffice->fathername = $request->fathername;
        $mainoffice->fatherfamilyname = $request->fatherfamilyname;
        $mainoffice->fmobile = $request->fmobile;
        $mainoffice->ftelephone = $request->ftelephone;
        $mainoffice->fpostcode = $request->fpostcode;
        $mainoffice->faddress = $request->faddress;
        $mainoffice->update();
        return response()->json('male parent data updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mainoffice = MaleParent::find($id);
        $mainoffice->delete();
        return response()->json('male parent data deleted');
    }
}
