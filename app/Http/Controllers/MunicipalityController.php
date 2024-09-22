<?php

namespace App\Http\Controllers;

use app\Services\MunicipalityService;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    protected $municipalityService;
    public function __construct(MunicipalityService $municipalityService)
    {
        $this->municipalityService = $municipalityService;
    }
    public function index(Request $request)
    {
        $paginate = $request->query('paginate') ?? 10;
        $search = $request->query('search') ?? null;
        $data = $this->municipalityService->getAll($paginate, $search);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = $this->municipalityService->create($request);
        return response()->json($data, 201);
    }

    public function update(Request $request, String $id)
    {
        $data = $this->municipalityService->update($request, $id);
        return response()->json($data, 200);
    }

    public function destroy(String $id)
    {
        $this->municipalityService->destroy($id);
        return response()->json(null, 204);
    }
}
