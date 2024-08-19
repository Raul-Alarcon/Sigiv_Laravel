<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gender = Gender::orderBy("created_at", "desc")->paginate(10);
        return response()->json($gender, 200);
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
        $gender = Gender::create($request->all());
        return response()->json($gender, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gender $gender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gender $gender)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(String $Id, Request $request)
    {
        $gender = Gender::findOrFail($Id);
        if ($gender != null) {
            $gender->update($request->all());
            return response()->json($gender, 200);
        }
        return response()->json(["message" => "The gender I request was not found or does not exist"], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gender $Id)
    {
        $gender = Gender::findOrFail($Id);
        $gender->delete();
        return response()->json(["message" => "Gender successfully deleted"], 200);
    }
}
