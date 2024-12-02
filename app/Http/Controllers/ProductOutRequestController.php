<?php

namespace App\Http\Controllers;

use App\Models\ApplicationStatus;
use App\Models\Employee;
use App\Models\Product;
use App\Models\ProductOutRequest;
use App\Services\ProductOutRequestService;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

use function Pest\Laravel\get;

class ProductOutRequestController extends Controller
{
    protected $productOutService;
    public function __construct(ProductOutRequestService $productOutService)
    {
        $this->productOutService = $productOutService;
    }

    public function index(Request $request){
        $paginate = $request->query('paginate') ?? 10; 
        $search = $request->query('search') ?? null; 
        $data = $this->productOutService->getAll($paginate, $search, ['description']);
        return response()->json($data, 200); 
    }  

    public function store(Request $request)
    {
        $data = $request->all();
        $data['date_request'] = Carbon::parse(Date::now())->format('Y-m-d');
        $data['status_id'] = 1; 
        $out = ProductOutRequest::create($data);
        return response()->json($out, 201);
    } 

    public function update(Request $request, string $id)
    {
        $data = $this->productOutService->update($request, $id);
        return response()->json($data, 200);
    } 

    public function updateStatus(Request $request, string $id)
    {
        $productStatus = $request->all();
        $out = $this->productOutService->updateProductStatus($productStatus['id'], $id);

        if($out) {
            $out->load(['product', 'user', 'userAuth','status']);
            $out = $this->productOutService->parseResponce($out);
            return response()->json($out, 200);
        }

        return response()->json(null, 404);
    }

    public function destroy(string $id)
    {
        $this->productOutService->destroy($id);
        return response()->json(null, 204);
    }

    public function getStatus(){
        $status = ApplicationStatus::select('id', 'name')->get();
        return response()->json($status, 200); 
    }

    public function getEmployees(){
        $employees = Employee::select('id', 'names', 'last_names')->get();
        $transformedEmployees = $employees->map(function ($employee) {
            return [
                'id' => $employee->id,
                'full_name' => $employee->names . ' ' . $employee->last_names,
            ];
        });

        return response()->json($transformedEmployees, 200); 
    }

    public function getProducts(){
        $products = Product::whereHas('stock', function ($query) {
            $query->where('current_stock', '>', 0);
        })->select(['id','name'])->get();
    
        return response()->json($products);
    }


 
}
