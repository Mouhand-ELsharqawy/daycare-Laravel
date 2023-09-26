<?php

namespace App\Http\Controllers;

use App\Models\Waitinglist;
use Illuminate\Http\Request;

class WaitingListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = Waitinglist::paginate(6);
        return response()->json(['Wait list data'=> $lists]);
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
            'familyname'=> 'required', 
            'address' => 'required', 
            'phone' => 'required', 
            'comments' => 'required', 
            'dateplacement' => 'required'
        ]);
        Waitinglist::create($request->all());
        return response()->json('Wait list data created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $list = Waitinglist::find($id);
        return response()->json(['Wait list data' => $list]);
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
            'familyname'=> 'required', 
            'address' => 'required', 
            'phone' => 'required', 
            'comments' => 'required', 
            'dateplacement' => 'required'
        ]);
        $waitinglist = Waitinglist::find($id);
        $waitinglist->familyname= $request->familyname;
        $waitinglist->address = $request->address;
        $waitinglist->phone = $request->phone;
        $waitinglist->comments = $request->comments;
        $waitinglist->dateplacement = $request->dateplacement;
        $waitinglist->update();
        return response()->json('Wait list data updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $waitinglist = Waitinglist::find($id);
        $waitinglist->delete();
        return response()->json('Wait list data deleted');
    }
}
