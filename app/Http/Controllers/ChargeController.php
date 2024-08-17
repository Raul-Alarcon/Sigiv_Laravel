<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $charges = Charge::orderBy("created_at", "desc")->paginate(10);
        return response()->json($charges, 200);
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
        $charge = Charge::create($request->all());
        return response()->json($charge, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Charge $charge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Charge $charge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(String $Id, Request $request)
    {
        $charge = Charge::findOrFail($Id);
        if ($charge != null) {
            $charge->update($request->all());
            return response()->json($charge, 200);
        }
        return response()->json(["message" => "The charge I requested was not found or does not exist"], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Charge $Id)
    {
        $charge = Charge::findOrFail($Id);
        $charge->delete();
        return response()->json(["message" => "Charge successfully deleted"], 200);
    }
}
