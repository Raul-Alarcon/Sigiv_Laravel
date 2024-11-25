<?php

namespace App\Http\Controllers;

use App\Models\Purchasestatus; 
use App\Services\PurchaseStatusService; 
use Illuminate\Http\Request;

class PurchasestatusController extends Controller
{
    protected $purchaseStatusService;
    public function __construct(PurchaseStatusService $purchaseStatusService)
    {
        $this->purchaseStatusService = $purchaseStatusService;
    }

    public function index(Request $request){
        $paginate = $request->query('paginate') ?? 10; 
        $search = $request->query('search') ?? null; 
        $data = $this->purchaseStatusService->getAll($paginate, $search, ['name', 'description']);
        return response()->json($data, 200); 
    }  

    public function store(Request $request)
    {
        $data = $this->purchaseStatusService->create($request);
        return response()->json($data, 201);
    } 

    public function update(Request $request, string $id)
    {
        $data = $this->purchaseStatusService->update($request, $id);
        return response()->json($data, 200);
    } 

    public function updateStatus(string $id)
    {
        $this->purchaseStatusService->updateStatus($id);
        return response()->json(null, 204);
    }

    public function destroy(string $id)
    {
        $this->purchaseStatusService->destroy($id);
        return response()->json(null, 204);
    }
}
