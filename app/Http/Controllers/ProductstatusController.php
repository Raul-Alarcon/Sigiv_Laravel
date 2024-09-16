<?php

namespace App\Http\Controllers;

use App\Models\Productstatus;
use App\Http\Requests\ProductstatusRequest;
use Illuminate\Http\JsonResponse;

class ProductstatusController extends Controller
{
    public function index() : JsonResponse
    {
        $productstatuses = Productstatus::orderBy("created_at", "desc")->paginate(10);
        return response()->json($productstatuses, 200);
    }
    public function store(ProductstatusRequest $request)
    {
        $validatedData = $request->validated();

        $productstatus = Productstatus::create($validatedData);
        return response()->json($productstatus, 201);
    }
    public function update(String $id, ProductstatusRequest $request)
    {
        $productstatus = Productstatus::findOrFail($id);
        $productstatus->update($request->validated());

        return response()->json($productstatus, 200);
    }
    public function destroy(String $id)
    {
        $productstatus = Productstatus::findOrFail($id);
        $productstatus->delete();

        return response()->json(["message" => "Productstatus deleted successfully"], 204);
    }

    public function updateStatus(String $id) : JsonResponse
    {
        $productstatus = Productstatus::findOrFail($id);
        $productstatus->status = !$productstatus->status;
        $productstatus->save();

        return response()->json(["message" => "Productstatus status updated successfully"], 204);
    }
}
