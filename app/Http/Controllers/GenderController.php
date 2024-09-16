<?php

namespace App\Http\Controllers;

use App\Services\GenderService;
use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{

    public function index()
    {
        $gender = Gender::orderBy("created_at", "desc")->paginate(10);
        return response()->json($gender, 200);
    }

    public function store(Request $request)
    {
        $gender = Gender::create($request->all());
        return response()->json($gender, 201);
    }

    public function update(String $id, Request $request)
    {
        $gender = Gender::findOrFail($id);
        if ($gender != null) {
            $gender->update($request->all());
            return response()->json($gender, 200);
        }
        return response()->json(["message" => "The gender I request was not found or does not exist"], 404);
    }

    public function updateStatus(string $id)
    {
        $gender = Gender::find($id);
        $gender->status = !$gender->status;
        $gender->update();
        return response()->json(null, 204);
    }

    public function destroy(String $id)
    {
        $gender = Gender::findOrFail($id);
        $gender->delete();
        return response()->json(["message" => "Gender successfully deleted"], 204);
    }
}
