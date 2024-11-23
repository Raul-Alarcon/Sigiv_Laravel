<?php

namespace App\Http\Controllers;

use app\Services\DepartmentService;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentService;
    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }
    public function index(Request $request)
    {
        $paginate = $request->query('paginate') ?? 10;
        $search = $request->query('search') ?? null;
        $data = $this->departmentService->getAll($paginate, $search);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = $this->departmentService->create($request);
        return response()->json($data, 201);
    }

    public function update(Request $request, String $id)
    {
        $data = $this->departmentService->update($request, $id);
        return response()->json($data, 200);
    }

    public function destroy(String $id)
    {
        $this->departmentService->destroy($id);
        return response()->json(null, 204);
    }
}
