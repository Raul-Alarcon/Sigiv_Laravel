<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use App\Services\OrderStatusService;
use App\Http\Requests\OrderStatusRequest;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    private $orderStatusService;
    public function __construct(OrderStatusService $orderStatusService)
    {
        $this->orderStatusService = $orderStatusService;
    }
    public function index(Request $request)
    {
        $paginate = request()->query('paginate') ?? 10;
        $search = request()->query('search') ?? null;
        $data = $this->orderStatusService->getAll($paginate, $search, ['name', 'description']);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = $this->orderStatusService->create($request);
        return response()->json($data, 201);
    }

    public function update(Request $request, string $id)
    {
        $data = $this->orderStatusService->update($request, $id);
        return response()->json($data, 200);
    }

    public function destroy(string $id)
    {
        $this->orderStatusService->destroy($id);
        return response()->json(null, 204);
    }
}
