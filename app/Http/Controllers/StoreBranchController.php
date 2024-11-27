<?php

namespace App\Http\Controllers;

use App\Models\StoreBranch;
use App\Http\Requests\StoreBranchRequest;
use App\Services\StoreBranchService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        try { 
            $validatedData = $request->validate([
                'logo' => 'nullable|string|max:200',
                'name' => 'required|string|max:200',
                'NIT' => 'nullable|string|max:20',
                'description' => 'required|string',
                'opening_date' => 'required|date', 
            ]);
     
            $validatedData['opening_date'] = Carbon::parse($validatedData['opening_date'])->format('Y-m-d');
            $data = StoreBranch::create($validatedData);
    
            return response()->json($data, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $data = StoreBranch::findOrFail($id);
            $validatedData = $request->validate([
                'logo' => 'nullable|string|max:200',
                'name' => 'required|string|max:200',
                'NIT' => 'nullable|string|max:20',
                'description' => 'required|string',
                'opening_date' => 'required|date', 
            ]);
     
            $validatedData['opening_date'] = Carbon::parse($validatedData['opening_date'])->format('Y-m-d');
            $data->update($validatedData);
    
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function destroy(string $id)
    { 
        try {
            $data = StoreBranch::findOrFail($id);
            $data->delete();
            $url = str_replace('/storage', 'public', $data->logo);
            Storage::delete($url);
            return response()->json(null, 204);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
