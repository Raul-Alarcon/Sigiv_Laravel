<?php

namespace App\Services;

use App\Models\Sector;

class SectorService
{
    public function index($paginate, $search = null)
    { 
        $query = Sector::query();
 
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        }
 
        return $query->paginate($paginate);
    }

    public function store($request)
    {
        return Sector::create($request->all());
    }

    public function show($id)
    {
        return Sector::find($id);
    }

    public function update($request, $id)
    {
        $sector = Sector::find($id);
        $sector->update($request->all());
        return $sector;
    }

    public function changeStatus($id)
    {
        $sector = Sector::find($id);
        $sector->status = !$sector->status;
        $sector->update();
    }

    public function destroy($id)
    {
        return Sector::destroy($id);
    }
}
