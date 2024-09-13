<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class ChargeController extends Controller
{ 
    public function index()
    {
        $charges = Charge::orderBy("created_at", "desc")->paginate(10);
        return response()->json($charges, 200);
    }
 
    public function store(Request $request)
    {
        $charge = Charge::create($request->all());
        return response()->json($charge, 201);
    }
 
 
    public function update(String $id, Request $request)
    {
        $charge = Charge::findOrFail($id);
        if ($charge != null) {
            $charge->update($request->all());
            return response()->json($charge, 200);
        }
        return response()->json(["message" => "The charge I requested was not found or does not exist"], 404);
    }


    public function updateStatus(String $id)
    {
        $charge = Charge::findOrFail($id);
        if ($charge != null) {
            $charge->status = !$charge->status;
            $charge->save();
            return response()->json(null, 204);
        }
        return response()->json(["message" => "The charge I requested was not found or does not exist"], 404);
    }
 
    public function destroy(String $id)
    {
        $charge = Charge::findOrFail($id);
        $charge->delete();
        return response()->json(["message" => "Charge successfully deleted"], 204);
    }
}
