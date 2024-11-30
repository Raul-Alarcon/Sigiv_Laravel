<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use App\Models\Gender;
use App\Services\CustomerService;
use Carbon\Carbon;
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
        $data = $this->customerService->getAll($paginate, $search, ['first_names', 'last_names', 'dui', 'email', 'phone', 'direcction']);
        return response()->json($data, 200);
    }

    public function store(CustomerRequest $request)
    {  
        $validatedData = $request->validated(); 
        $validatedData['birth_date'] = Carbon::parse($validatedData['birth_date'])->format('Y-m-d'); 
        $customer = Customer::create($validatedData);

        $customer->load('gender');
        $customer = $this->customerService->parseCustomerResponse($customer);
        return response()->json($customer, 201);
    }

    public function update(Request $request, string $id)
    { 
        $data = $request->all(); 
        $data['birth_date'] = Carbon::parse($data['birth_date'])->format('Y-m-d'); 

        $customer = Customer::findOrFail($id);
        
        if($customer){
            $customer->update($data);
            $customer->load('gender');
            $customer = $this->customerService->parseCustomerResponse($customer);
            return response()->json($customer, 200);
        }

        return response()->json(null, 404);
    }

    public function destroy(string $id)
    {
        $this->customerService->destroy($id);
        return response()->json(null, 204);
    }
    
    public function genders()
    {
        $genders = Gender::where('status', true)
        ->select(['id', 'name'])
        ->get();
        
        return response()->json($genders, 200);
    }
}
