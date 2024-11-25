<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Services\ChargeService;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class ChargeController extends Controller
{ 
    protected $chargeService;
    public function __construct(ChargeService $chargeService)
    {
        $this->chargeService = $chargeService;
    }

    public function index(Request $request){
        $paginate = $request->query('paginate') ?? 10; 
        $search = $request->query('search') ?? null; 
        $data = $this->chargeService->getAll($paginate, $search, ['name']);
        return response()->json($data, 200); 
    }  

    public function store(Request $request)
    {
        $data = $this->chargeService->create($request);
        return response()->json($data, 201);
    } 

    public function update(Request $request, string $id)
    {
        $data = $this->chargeService->update($request, $id);
        return response()->json($data, 200);
    } 

    public function updateStatus(string $id)
    {
        $this->chargeService->updateStatus($id);
        return response()->json(null, 204);
    }

    public function destroy(string $id)
    {
        $this->chargeService->destroy($id);
        return response()->json(null, 204);
    }
}
