<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }
    public function index(Request $request)
    {
        $paginate = request()->query('paginate') ?? 10;
        $search = request()->query('search') ?? null;
        $data = $this->customerService->getAll($paginate, $search, ['first_name', 'second_name', 'third_name', 'first_surname', 'second_surname', 'third_surname', 'dui', 'birth']);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = $this->customerService->create($request);
        return response()->json($data, 201);
    }

    public function update(Request $request, string $id)
    {
        $data = $this->customerService->update($request, $id);
        return response()->json($data, 200);
    }

    public function destroy(string $id)
    {
        $this->customerService->destroy($id);
        return response()->json(null, 204);
    }
}
