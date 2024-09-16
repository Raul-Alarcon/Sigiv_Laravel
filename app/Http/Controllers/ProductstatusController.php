<?php

namespace App\Http\Controllers;

use App\Models\Productstatus;
use App\Http\Requests\ProductstatusRequest;
use App\Services\ProductStatusService;
use Illuminate\Http\Request;

class ProductstatusController extends Controller
{
    protected $productStatusService;
    public function __construct(ProductStatusService $productStatusService)
    {
        $this->productStatusService = $productStatusService;
    }

    public function index(Request $request){
        $paginate = $request->query('paginate') ?? 10; 
        $search = $request->query('search') ?? null; 
        $data = $this->productStatusService->getAll($paginate, $search, ['name', 'description']);
        return response()->json($data, 200); 
    }  

    public function store(Request $request)
    {
        $data = $this->productStatusService->create($request);
        return response()->json($data, 201);
    } 

    public function update(Request $request, string $id)
    {
        $data = $this->productStatusService->update($request, $id);
        return response()->json($data, 200);
    } 

    public function updateStatus(string $id)
    {
        $this->productStatusService->updateStatus($id);
        return response()->json(null, 204);
    }

    public function destroy(string $id)
    {
        $this->productStatusService->destroy($id);
        return response()->json(null, 204);
    }
}