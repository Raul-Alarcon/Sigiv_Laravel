<?php

namespace App\Services;
use app\Models\Country;
use Ivalidate\Validation\Rules\In;

class CountryService
{
    public function getAll($paginate, $search = null)
    {
        $query = Country::query();
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('code', 'like', '%' . $search . '%');
        }
        return $query->paginate($paginate);
    }

    public function create($request)
    {
        return Country::create($request->all());
    }

    public function findById($id)
    {
        return Country::find($id);
    }

    public function update($request, $id)
    {
        $country = Country::find($id);
        $country->update($request->all());
        return $country;
    }

    public function destroy($id)
    {
        return Country::destroy($id);
    }
}