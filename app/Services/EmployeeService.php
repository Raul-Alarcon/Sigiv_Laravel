<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\Gender;

class EmployeeService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new Employee());
    }

    public function getAll($paginate, $search = null, $fields = [], $orderBy = 'id', $order = 'ASC')
    {
        $Employee = $this->model->with(['charge', 'storebranch', 'gender']);

        if ($search && !empty($fields)) {
            $Employee->where(function ($q) use ($search, $fields) {
                foreach ($fields as $field) {
                    $q->orWhere($field, 'like', '%' . $search . '%');
                }
            });
        }

        $paginatedEmployee = $Employee->orderBy($orderBy, $order)->paginate($paginate);

        $paginatedEmployee->getCollection()->transform(function ($employee) {
            $employee->charge_name = $employee->charge->name;
            $employee->gender_name = $employee->gender->name;
            $employee->storebranch_name = $employee->storebranch->name;

            unset($employee->gender);
            unset($employee->storebranch);
            unset($employee->charge);

            return $employee;
        });

        return $paginatedEmployee;
    }

    public function update($request, $id)
    {
        $employee = $this->model->findOrFail($id);
        
        if ($employee) {
            $employee->update($request->all());   
            $employee->load(['charge', 'storebranch', 'gender']);

            $employee->charge_name = $employee->charge->name;
            $employee->gender_name = $employee->gender->name;
            $employee->storebranch_name = $employee->storebranch->name;

            unset($employee->gender);
            unset($employee->storebranch);
            unset($employee->charge);

            return $employee;
        }

        return null;
 
    }

    public function create($request)
    {
        $employee =  $this->model->create($request->all()); 
        return [
            $employee->all(), 
            'gender_name' => "asd", 
            'storebranch_name' => 'asdasds', 
            'charge_name' => 'asdas'
        ];
    }
}
