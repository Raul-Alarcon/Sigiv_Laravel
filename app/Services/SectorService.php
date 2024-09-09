<?php

namespace App\Services;
use App\Models\Sector;

class SectorService
{
    public function index(int $paginate = 10)
    {
        return Sector::paginate($paginate);
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

    public function destroy($id)
    {
        return Sector::destroy($id);
    }
}
