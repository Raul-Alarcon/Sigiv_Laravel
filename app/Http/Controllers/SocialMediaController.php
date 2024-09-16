<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use App\Services\SocialMediaService;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    protected $socialMediaService;
    public function __construct(SocialMediaService $socialMediaService)
    {
        $this->socialMediaService = $socialMediaService;
    }

    public function index(Request $request){
        $paginate = $request->query('paginate') ?? 10; 
        $search = $request->query('search') ?? null; 
        $data = $this->socialMediaService->getAll($paginate, $search, ['name']);
        return response()->json($data, 200); 
    }  

    public function store(Request $request)
    {
        $data = $this->socialMediaService->create($request);
        return response()->json($data, 201);
    } 

    public function update(Request $request, string $id)
    {
        $data = $this->socialMediaService->update($request, $id);
        return response()->json($data, 200);
    } 

    public function updateStatus(string $id)
    {
        $this->socialMediaService->updateStatus($id);
        return response()->json(null, 204);
    }

    public function destroy(string $id)
    {
        $this->socialMediaService->destroy($id);
        return response()->json(null, 204);
    }
}
