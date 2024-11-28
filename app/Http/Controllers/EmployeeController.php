<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use App\Models\Charge;
use App\Models\Gender;
use App\Models\StoreBranch;
use App\Services\EmployeeService;
use Carbon\Carbon;
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
        $data = $this->employeeService->getAll($paginate, $search, ['code', 'names', 'last_names']);
        return response()->json($data, 200);
    }

    public function store(EmployeeRequest $request)
    {
        try{
            $validatedData = $request->validated(); 
            $validatedData['age'] = Carbon::parse($validatedData['age'])->format('Y-m-d'); 
            $validatedData['hiring_date'] = Carbon::parse($validatedData['hiring_date'])->format('Y-m-d'); 
            $employee = Employee::create($validatedData); 

            $employee->load(['charge', 'storebranch', 'gender']);

            $employee->charge_name = $employee->charge->name;
            $employee->gender_name = $employee->gender->name;
            $employee->storebranch_name = $employee->storebranch->name;

            unset($employee->gender);
            unset($employee->storebranch);
            unset($employee->charge);


            return response()->json($employee, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
        
    }

    public function update(Request $request, string $id)
    {
        $employee = $request->all();
        $employee['age'] = Carbon::parse($employee['age'])->format('Y-m-d'); 
        $employee['hiring_date'] = Carbon::parse($employee['hiring_date'])->format('Y-m-d'); 

        $data = Employee::findOrFail($id);
        
        if ($data) {
            $data->update($employee);

            $data->load(['charge', 'storebranch', 'gender']);

            $data->charge_name = $data->charge->name;
            $data->gender_name = $data->gender->name;
            $data->storebranch_name = $data->storebranch->name;

            unset($data->gender);
            unset($data->storebranch);
            unset($data->charge);
        }
 
        return response()->json($data, 200);
    }

    public function destroy(string $id)
    {
        $this->employeeService->destroy($id);
        return response()->json(null, 204);
    }

    public function getGenders()
    {
        $genders = Gender::where('status', true)
        ->select('id', 'name')
        ->get();
        return response()->json($genders, 200);
    }

    public function getStoreBranches()
    {
        $storeBranches = StoreBranch::select('id', 'name')->get(); 
        return response()->json($storeBranches, 200);
    }

    public function getCharge(){
        $charge = Charge::where('status', true)
        ->select('id', 'name')
        ->get();
        return response()->json($charge, 200);
    }
}
