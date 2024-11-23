<?php

namespace App\Http\Controllers;

use app\Services\DistrictService;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    protected $districtService;
    public function __construct(DistrictService $districtService)
    {
        $this->districtService = $districtService;
    }
    public function index(Request $request)
    {
        $paginate = $request->query('paginate') ?? 10;
        $search = $request->query('search') ?? null;
        $data = $this->districtService->getAll($paginate, $search);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = $this->districtService->create($request);
        return response()->json($data, 201);
    }

    public function update(Request $request, String $id)
    {
        $data = $this->districtService->update($request, $id);
        return response()->json($data, 200);
    }

    public function destroy(String $id)
    {
        $this->districtService->destroy($id);
        return response()->json(null, 204);
    }
}
