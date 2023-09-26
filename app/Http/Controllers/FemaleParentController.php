<?php

namespace App\Http\Controllers;

use App\Models\FemaleParent;
use Illuminate\Http\Request;

class FemaleParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $femaleparents = FemaleParent::paginate(6);
        return response()->json(['Female Parents' => $femaleparents]);
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
            'mothername' => 'required', 
            'motherfamilyname' => 'required', 
            'mmobile' => 'required', 
            'mtelephone' => 'required', 
            'mpostcode' => 'required', 
            'maddress' => 'required' 
        ]);
        FemaleParent::create($request->all());
        return response()->json('Female Parent Data created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $femaleparent = FemaleParent::find($id);
        return response()->json(['Female Parent'=>$femaleparent]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'mothername' => 'required', 
            'motherfamilyname' => 'required', 
            'mmobile' => 'required', 
            'mtelephone' => 'required', 
            'mpostcode' => 'required', 
            'maddress' => 'required' 
        ]);

        $femaleparent = FemaleParent::find($id);
        $femaleparent->mothername = $request->mothername;
        $femaleparent->motherfamilyname = $request->motherfamilyname;
        $femaleparent->mmobile = $request->mmobile;
        $femaleparent->mtelephone = $request->mtelephone; 
        $femaleparent->mpostcode = $request->mpostcode;
        $femaleparent->maddress = $request->maddress;
        $femaleparent->update();
        return response()->json(['Female Parent Data updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $femaleparent = FemaleParent::find($id);
        $femaleparent->delete();
        return response()->json(['Female Parent Data deleted']);
    }
}
