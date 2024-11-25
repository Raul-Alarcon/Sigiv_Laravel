<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{ 
    protected $companyService;
    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index(Request $request){
        $paginate = $request->query('paginate') ?? 10; 
        $search = $request->query('search') ?? null; 
        $data = $this->companyService->getAll($paginate, $search, ['name', 'nrc','email']);
        return response()->json($data, 200); 
    }  

    public function store(Request $request)
    {
        $data = $this->companyService->create($request);
        return response()->json($data, 201);
    } 

    public function update(Request $request, string $id)
    {
        $data = $this->companyService->update($request, $id);
        return response()->json($data, 200);
    } 

    public function updateStatus(string $id)
    {
        $this->companyService->updateStatus($id);
        return response()->json(null, 204);
    }

    public function destroy(string $id)
    {
        $this->companyService->destroy($id);
        return response()->json(null, 204);
    }
}
