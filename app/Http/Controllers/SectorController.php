<?php

namespace App\Http\Controllers;

use App\Services\SectorService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Sector;

class SectorController extends Controller
{
    protected $sectorService;
    public function __construct(SectorService $sectorService)
    {
        $this->sectorService = $sectorService;
    }

    public function index(Request $request)
    { 
        $paginate = $request->query('paginate') ?? 10; 
        $search = $request->query('search') ?? null; 
        $sectors = $this->sectorService->index($paginate, $search); 
        return response()->json($sectors, 200);
    }

    public function changeStatus(String $id)
    {
        $this->sectorService->changeStatus($id);
        return response()->json(null, 204);
    }

    public function store(Request $request)
    {
        $request = $this->sectorService->store($request);
        return response()->json($request, 201);
    }

    public function update(Request $request, string $id)
    {
        $sector = $this->sectorService->update($request, $id);
        return response()->json($sector, 200);
    }

    public function destroy(string $id)
    {
        $this->sectorService->destroy($id);
        return response()->json(null, 204);
    }
}
