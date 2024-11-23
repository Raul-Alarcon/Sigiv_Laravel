<?php
namespace App\Services;
use App\Models\Municipality;
use Illuminate\Validation\Rules\In;

class MunicipalityService
{
    public function getAll($paginate, $search = null)
    {
        $query = Municipality::query();
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('code', 'like', '%' . $search . '%')
                ->orWhere('department_id', 'like', '%' . $search . '%');
        }
        return $query->paginate($paginate);
    }

    public function create($request)
    {
        return Municipality::create($request->all());
    }

    public function findById($id)
    {
        return Municipality::find($id);
    }

    public function update($request, $id)
    {
        $municipality = Municipality::find($id);
        $municipality->update($request->all());
        return $municipality;
    }

    public function destroy($id)
    {
        return Municipality::destroy($id);
    }
}
