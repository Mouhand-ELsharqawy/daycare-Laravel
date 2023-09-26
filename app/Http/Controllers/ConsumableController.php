<?php

namespace App\Http\Controllers;

use App\Models\Consumable;
use Illuminate\Http\Request;

class ConsumableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consumables = Consumable::paginate(6);
        return response()->json(['consumables' => $consumables]);
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
            'fingerpaint' => 'required', 
            'paper' => 'required', 
            'cleaningsupplies' => 'required', 
            'sippycubs' => 'required', 
            'spoons' => 'required', 
            'crayons' => 'required', 
            'garbagebag' => 'required', 
            'diabers' => 'required', 
            'forks' => 'required', 
            'penciles' => 'required', 
            'bowls' => 'required', 
            'babywipes' => 'required'
        ]);
        Consumable::create($request->all());
        return response()->json('consumables created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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
            'fingerpaint' => 'required', 
            'paper' => 'required', 
            'cleaningsupplies' => 'required', 
            'sippycubs' => 'required', 
            'spoons' => 'required', 
            'crayons' => 'required', 
            'garbagebag' => 'required', 
            'diabers' => 'required', 
            'forks' => 'required', 
            'penciles' => 'required', 
            'bowls' => 'required', 
            'babywipes' => 'required'
        ]);

        $consumable = Consumable::find($id);
        $consumable->fingerpaint = $request->fingerpaint;
        $consumable->paper = $request->paper;
        $consumable->cleaningsupplies = $request->cleaningsupplies; 
        $consumable->sippycubs = $request->sippycubs;
        $consumable->spoons = $request->spoons;
        $consumable->crayons = $request->crayons;
        $consumable->garbagebag = $request->garbagebag;
        $consumable->diabers = $request->diabers;
        $consumable->forks = $request->forks;
        $consumable->penciles = $request->penciles;
        $consumable->bowls = $request->bowls;
        $consumable->babywipes = $request->babywipes; 
        $consumable->update();
        return response()->json('consumables updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $consumable = Consumable::find($id);
        $consumable->delete();
        return response()->json('consumables deleted');
    }
}
