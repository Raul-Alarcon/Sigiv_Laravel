<?php

namespace App\Http\Controllers;

use App\Models\ProductStock;
use App\Services\ProductStockService;
use App\Http\Requests\ProductStockRequest;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    protected $productStockService;
    public function __construct(ProductStockService $productStockService)
    {
        $this->productStockService = $productStockService;
    }
    public function index(Request $request)
    {
        $paginate = request()->query('paginate') ?? 10;
        $search = request()->query('search') ?? null;
        $data = $this->productStockService->getAll($paginate, $search, ['product_id', 'stock']);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = $this->productStockService->create($request);
        return response()->json($data, 201);
    }

    public function update(Request $request, string $id)
    {
        $data = $this->productStockService->update($request, $id);
        return response()->json($data, 200);
    }

    public function destroy(string $id)
    {
        $this->productStockService->destroy($id);
        return response()->json(null, 204);
    }
}
