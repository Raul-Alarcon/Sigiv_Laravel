<?php

namespace App\Http\Controllers;

use App\Models\StoreBranch;
use App\Http\Requests\StoreBranchRequest;
use App\Services\StoreBranchService;
use Illuminate\Http\Request;

class StoreBranchController extends Controller
{
    protected $storeBranchService;
    public function __construct(StoreBranchService $storeBranchService)
    {
        $this->storeBranchService = $storeBranchService;
    }

    public function index(Request $request)
    {
        $paginate = request()->query('paginate') ?? 10;
        $search = request()->query('search') ?? null;
        $data = $this->storeBranchService->getAll($paginate, $search, ['name', 'description', 'NIT']);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = $this->storeBranchService->create($request);
        return response()->json($data, 201);
    }

    public function update(Request $request, string $id)
    {
        $data = $this->storeBranchService->update($request, $id);
        return response()->json($data, 200);
    }

    public function destroy(string $id)
    {
        $this->storeBranchService->destroy($id);
        return response()->json(null, 204);
    }
}
