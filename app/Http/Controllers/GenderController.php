<?php

namespace App\Http\Controllers;

use App\Services\GenderService;
use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{

    protected $genderService;
    public function __construct(GenderService $genderService)
    {
        $this->genderService = $genderService;
    }

    public function index(Request $request){
        $paginate = $request->query('paginate') ?? 10; 
        $search = $request->query('search') ?? null; 
        $data = $this->genderService->getAll($paginate, $search, ['name']);
        return response()->json($data, 200); 
    }  

    public function store(Request $request)
    {
        $data = $this->genderService->create($request);
        return response()->json($data, 201);
    } 

    public function update(Request $request, string $id)
    {
        $data = $this->genderService->update($request, $id);
        return response()->json($data, 200);
    } 

    public function updateStatus(string $id)
    {
        $this->genderService->updateStatus($id);
        return response()->json(null, 204);
    }

    public function destroy(string $id)
    {
        $this->genderService->destroy($id);
        return response()->json(null, 204);
    }
}
