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

    public function index()
    {
        $sectors = $this->sectorService->index();

        return Inertia::render('Sector/index', [
            'sectors' => $sectors
        ]);
    }

    public function changeStatus(String $id){
        $sector = Sector::find($id);
        if (!$sector) {
            return response()->json(['message' => 'Sector not found'], 404);
        }
        $sector->status = !$sector->status;
        $sector->update();
        return response()->json($sector, 200);
    }

    public function store(Request $request)
    {
        $request = $this->sectorService->store($request);
        return response()->json($request, 200);
    }

    public function update(Request $request, string $id)
    {
        $sector = $this->sectorService->update($request, $id);
        return response()->json(['El Sector se actualizo con exito', $sector], 200);
    }

    public function destroy(string $id)
    {
        $sector = $this->sectorService->destroy($id);
        return response()->json(['El Sector se elimino con exito', $sector], 200);
    }
}
