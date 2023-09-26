<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Children;
use App\Models\FemaleParent;
use App\Models\MaleParent;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $childrens = Children::join('male_parents','childrens.male_parents_id','=','male_parents.id')
        ->join('female_parents','childrens.female_parents_id','=','female_parents.id')
        ->select('male_parents.fathername', 'male_parents.fatherfamilyname',
         'male_parents.fmobile', 'male_parents.ftelephone', 'male_parents.fpostcode', 
         'male_parents.faddress','female_parents.mothername', 'female_parents.motherfamilyname',
         'female_parents.mmobile', 'female_parents.mtelephone', 'female_parents.mpostcode',
         'female_parents.maddress', 'childrens.name', 'childrens.gender', 'childrens.dob',
         'childrens.class', 'childrens.currentlocation')
         ->paginate(6);
         return response()->json(['childrens'=> $childrens]);
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
            'malename' => 'required', 
            'femalename'  => 'required', 
            'name' => 'required', 
            'gender' => 'required', 
            'dob' => 'required', 
            'class' => 'required', 
            'currentlocation' => 'required',
        ]);

        $maleId = MaleParent::where('fathername',$request->malename)->first()->id;
        $femaleId = FemaleParent::where('mothername',$request->femalename)->first()->id;

        Children::create([
            'male_parents_id' => $maleId,
            'female_parents_id' => $femaleId , 
            'name' => $request->name, 
            'gender' => $request->gender, 
            'dob' => $request->dob, 
            'class'=> $request->class, 
            'currentlocation' =>$request->currentlocation
        ]);
        return response()->json(['children data created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $childrens = Children::join('male_parents','childrens.male_parents_id','=','male_parents.id')
        ->join('female_parents','childrens.female_parents_id','=','female_parents.id')
        ->select('male_parents.fathername', 'male_parents.fatherfamilyname',
         'male_parents.fmobile', 'male_parents.ftelephone', 'male_parents.fpostcode', 
         'male_parents.faddress','female_parents.mothername', 'female_parents.motherfamilyname',
         'female_parents.mmobile', 'female_parents.mtelephone', 'female_parents.mpostcode',
         'female_parents.maddress', 'childrens.name', 'childrens.gender', 'childrens.dob',
         'childrens.class', 'childrens.currentlocation')
         ->where('childrens.id',$id)
         ->get();

         return response()->json(['childrens'=> $childrens]);
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
            'malename' => 'required', 
            'femalename'  => 'required', 
            'name' => 'required', 
            'gender' => 'required', 
            'dob' => 'required', 
            'class' => 'required', 
            'currentlocation' => 'required',
        ]);

        $maleId = MaleParent::where('fathername',$request->malename)->first()->id;
        $femaleId = FemaleParent::where('mothername',$request->femalename)->first()->id;

        $children = Children::find($id);

        $children->male_parents_id = $maleId;
        $children->female_parents_id = $femaleId ;
        $children->name = $request->name; 
        $children->gender = $request->gender; 
        $children->dob = $request->dob;
        $children->class = $request->class;
        $children->currentlocation = $request->currentlocation;
        $children->update();
        return response()->json('children data updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $children = Children::find($id);
        $children->delete();
        return response()->json('children data deleted');
    }
}
