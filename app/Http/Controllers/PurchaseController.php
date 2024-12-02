<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Purchasestatus;
use App\Models\Supplier;
use App\Services\PurchaseService;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    protected $purchaseService;
    public function __construct(PurchaseService $purchaseService)
    {
        $this->purchaseService = $purchaseService;
    }

    public function index(Request $request)
    {
        $paginate = $request->query('paginate') ?? 10;
        $search = $request->query('search') ?? null;
        $data = $this->purchaseService->getAll($paginate, $search, ['']);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['purchase_status_id'] = 1;
        $data['total'] = 0;
        $data['invoice_number'] = $this->purchaseService->generateInvoiceNumber(); 
        $data['purchase_date'] = date('Y-m-d H:i:s', strtotime($data['purchase_date']));
        $data['total'] = number_format($data['total'], 2, '.', '');
 
        $purchase = Purchase::create($data);

        return response()->json($purchase, 201);
    }

    public function update(Request $request, string $id)
    {
        $data = $this->purchaseService->update($request, $id);
        return response()->json($data, 200);
    }

    public function updateStatus(string $id)
    {
        $this->purchaseService->updateStatus($id);
        return response()->json(null, 204);
    }

    public function destroy(string $id)
    {
        $this->purchaseService->destroy($id);
        return response()->json(null, 204);
    }


    public function getPurchaseStatus()
    {
        $status = Purchasestatus::where('status', true)
            ->select('id', 'name')
            ->get();

        return response()->json($status, 200);
    }


    public function getSuppliers()
    {
        $suppliers = Supplier::where('status', true)
            ->select('id', 'name')
            ->get();

        return response()->json($suppliers, 200);
    }

    
}
