<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }
    public function index(Request $request)
    {
        $paginate = request()->query('paginate') ?? 10;
        $search = request()->query('search') ?? null;
        $data = $this->employeeService->getAll($paginate, $search, ['name', 'email', 'phone']);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = $this->employeeService->create($request);
        return response()->json($data, 201);
    }

    public function update(Request $request, string $id)
    {
        $data = $this->employeeService->update($request, $id);
        return response()->json($data, 200);
    }

    public function destroy(string $id)
    {
        $this->employeeService->destroy($id);
        return response()->json(null, 204);
    }
}
