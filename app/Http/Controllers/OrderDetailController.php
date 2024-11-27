<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Services\OrderDetailService;
use App\Http\Requests\OrderDetailRequest;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    private $orderDetailService;
    public function __construct(OrderDetailService $orderDetailService)
    {
        $this->orderDetailService = $orderDetailService;
    }
    public function index(Request $request)
    {
        $paginate = $request->query('paginate') ?? 10;
        $search = $request->query('search') ?? null;
        $data = $this->orderDetailService->getAll($paginate, $search, ['order_id', 'product_id', 'quantity', 'unit_price', 'subtotal']);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = $this->orderDetailService->create($request);
        return response()->json($data, 201);
    }

    public function update(Request $request, string $id)
    {
        $data = $this->orderDetailService->update($request, $id);
        return response()->json($data, 200);
    }

    public function destroy(string $id)
    {
        $this->orderDetailService->destroy($id);
        return response()->json(null, 204);
    }
}
