<?php

namespace App\Http\Controllers;

use App\Models\Purchasestatus;
use App\Http\Requests\PurchasestatusRequest;
use Illuminate\Http\JsonResponse;

class PurchasestatusController extends Controller
{
    public function index() : JsonResponse
    {
        $purchasestatuses = Purchasestatus::orderBy("created_at", "desc")->paginate(10);
        return response()->json($purchasestatuses, 200);
    }
    public function store(PurchasestatusRequest $request) : JsonResponse
    {
        $validatedData = $request->validated();

        $purchasestatus = Purchasestatus::create($validatedData);
        return response()->json($purchasestatus, 201);
    }
    public function update(String $id, PurchasestatusRequest $purchasestatusRequest) : JsonResponse
    {
        $purchasestatus = Purchasestatus::findOrFail($id);
        $purchasestatus->update($purchasestatusRequest->validated());

        return response()->json($purchasestatus, 200);
    }
    public function destroy(String $id)
    {
        $purchasestatus = Purchasestatus::findOrFail($id);
        $purchasestatus->delete();

        return response()->json(["message" => "Purchasestatus deleted successfully"], 204);
    }

    public function updateStatus(String $id) : JsonResponse
    {
        $purchasestatus = Purchasestatus::findOrFail($id);
        $purchasestatus->status = !$purchasestatus->status;
        $purchasestatus->save();

        return response()->json(["message" => "Purchasestatus status updated successfully"], 204);
    }
}
