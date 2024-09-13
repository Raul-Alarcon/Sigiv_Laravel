<?php
namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\SuppliersRequest;
use Illuminate\Http\JsonResponse;

class SupplierController extends Controller
{
    public function index(): JsonResponse
    {
        $suppliers = Supplier::orderBy("created_at", "desc")->paginate(10);
        return response()->json($suppliers, 200);
    }

    public function store(SuppliersRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        $supplier = Supplier::create($validatedData);
        return response()->json($supplier, 201);
    }

    public function update(string $id, SuppliersRequest $request): JsonResponse
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->validated());

        return response()->json($supplier, 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return response()->json(["message" => "Supplier deleted successfully"], 204);
    }

    public function updateStatus(string $id): JsonResponse
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->status = !$supplier->status;
        $supplier->save();

        return response()->json(["message" => "Supplier status updated successfully"], 204);
    }
}
