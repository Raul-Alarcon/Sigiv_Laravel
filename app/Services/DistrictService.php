<?php

namespace App\Services;
use app\Models\District;
use Ivalidate\Validation\Rules\In;

class DistrictService
{
    public function getAll($paginate, $search = null)
    {
        $query = District::query();
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('code', 'like', '%' . $search . '%')
                ->orWhere('municipality_id', 'like', '%' . $search . '%');
        }
        return $query->paginate($paginate);
    }

    public function create($request)
    {
        return District::create($request->all());
    }

    public function findById($id)
    {
        return District::find($id);
    }

    public function update($request, $id)
    {
        $district = District::find($id);
        $district->update($request->all());
        return $district;
    }

    public function destroy($id)
    {
        return District::destroy($id);
    }
}