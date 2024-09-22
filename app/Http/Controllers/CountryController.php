<?php

namespace App\Http\Controllers;

use App\Services\CountryService;
use Illuminate\Http\Request;


class CountryController extends Controller
{
    protected $countryService;
    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }
    public function index(Request $request)
    {
        $paginate = $request->query('paginate') ?? 10;
        $search = $request->query('search') ?? null;
        $data = $this->countryService->getAll($paginate, $search);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = $this->countryService->create($request);
        return response()->json($data, 201);
    }

    public function update(Request $request, String $id)
    {
        $data = $this->countryService->update($request, $id);
        return response()->json($data, 200);
    }
    
    public function destroy(String $id)
    {
        $this->countryService->destroy($id);
        return response()->json(null, 204);
    }
}
