<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderService;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    public function index(Request $request)
    {
        $paginate = $request->query('paginate') ?? 10;
        $search = $request->query('search') ?? null;
        $data = $this->orderService->getAll($paginate, $search, ['order_number', 'order_date', 'status', 'total', 'customer_id', 'order_status_id']);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = $this->orderService->create($request);
        return response()->json($data, 201);
    }

    public function update(Request $request, string $id)
    {
        $data = $this->orderService->update($request, $id);
        return response()->json($data, 200);
    }

    public function updateStatus(string $id)
    {
        $this->orderService->updateStatus($id);
        return response()->json(null, 204);
    }

    public function destroy(string $id)
    {
        $this->orderService->destroy($id);
        return response()->json(null, 204);
    }
}
