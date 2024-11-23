<?php

namespace App\Services;
use app\Models\Department;
use Ivalidate\Validation\Rules\In;

class DepartmentService
{
    public function getAll($paginate, $search = null)
    {
        $query = Department::query();
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('code', 'like', '%' . $search . '%')
                ->orWhere('country_id', 'like', '%' . $search . '%');
        }
        return $query->paginate($paginate);
    }

    public function create($request)
    {
        return Department::create($request->all());
    }

    public function findById($id)
    {
        return Department::find($id);
    }

    public function update($request, $id)
    {
        $department = Department::find($id);
        $department->update($request->all());
        return $department;
    }

    public function destroy($id)
    {
        return Department::destroy($id);
    }
}