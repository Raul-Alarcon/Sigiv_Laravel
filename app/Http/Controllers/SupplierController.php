<?php
namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\SuppliersRequest;
use App\Services\SupplierService; 
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    protected $supplierService;
    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function index(Request $request){
        $paginate = $request->query('paginate') ?? 10; 
        $search = $request->query('search') ?? null; 
        $data = $this->supplierService->getAll($paginate, $search, ['name', 'description', 'email']);
        return response()->json($data, 200); 
    }  

    public function store(Request $request)
    {
        $data = $this->supplierService->create($request);
        return response()->json($data, 201);
    } 

    public function update(Request $request, string $id)
    {
        $data = $this->supplierService->update($request, $id);
        return response()->json($data, 200);
    } 

    public function updateStatus(string $id)
    {
        $this->supplierService->updateStatus($id);
        return response()->json(null, 204);
    }

    public function destroy(string $id)
    {
        $this->supplierService->destroy($id);
        return response()->json(null, 204);
    }
}