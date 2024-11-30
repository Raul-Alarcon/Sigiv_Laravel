<?php

namespace App\Http\Controllers;

use App\Models\ApplicationStatus;
use App\Services\ApplicationStatusService;
use App\Http\Requests\ApplicationStatusRequest;
use Illuminate\Http\Request;

class ApplicationStatusController extends Controller
{
    protected $applicationStatusService;
    public function __construct(ApplicationStatusService $applicationStatusService)
    {
        $this->applicationStatusService = $applicationStatusService;
    }
    public function index(Request $request)
    {
        $paginate = $request->query('paginate') ?? 10;
        $search = $request->query('search') ?? null;
        $data = $this->applicationStatusService->getAll($paginate, $search, ['name', 'description']);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = $this->applicationStatusService->create($request);
        return response()->json($data, 201);
    }

    public function update(Request $request, string $id)
    {
        $data = $this->applicationStatusService->update($request, $id);
        return response()->json($data, 200);
    }

    public function destroy(string $id)
    {
        $this->applicationStatusService->destroy($id);
        return response()->json(null, 204);
    }
}
