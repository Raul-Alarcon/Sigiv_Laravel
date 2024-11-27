<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
use App\Models\Supplier;
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

    public function getProductsByStock(Request $request)
    {
        $paginate = $request->query('paginate', 10);
        $search = $request->query('search', null);
        
        $query = Product::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $query->whereHas('stock', function ($stockQuery) {
            $stockQuery->where(function ($query) {
                $query->where('current_stock', '<=', 0)
                      ->orWhere('current_stock', '>=', 2);
            });
        });

        $products = $query->paginate($paginate);

        return response()->json($products, 200);
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

    public function updateStatus(string $id)
    {
        $this->productService->updateStatus($id);
        return response()->json(null, 204);
    }

    public function destroy(string $id)
    {
        $this->productService->destroy($id);
        return response()->json(null, 204);
    }

    public function getSupplier() {   
        $supplier = Supplier::where('status', true)
            ->select(['id', 'name'])
            ->get();

        return response()->json($supplier, 200); 
    }
}
