<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index(Request $request)
    {
        $paginate = request()->query('paginate') ?? 10;
        $search = request()->query('search') ?? null;
        $data = $this->productService->getAll($paginate, $search, ['name', 'price']);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = $this->productService->create($request);
        return response()->json($data, 201);
    }

    public function update(Request $request, string $id)
    {
        $data = $this->productService->update($request, $id);
        return response()->json($data, 200);
    }

    public function destroy(string $id)
    {
        $this->productService->destroy($id);
        return response()->json(null, 204);
    }
}
