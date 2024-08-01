<?php

namespace App\Services;
use App\Models\Category;

class CategoryService
{ 
    public function index()
    {
        return Category::all();
    }

    public function store($request)
    {
        return Category::create($request->all());
    }

    public function show($id)
    {
        return Category::find($id);
    }

    public function update($request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        return $category;
    }

    public function destroy($id)
    {
        return Category::destroy($id);
    }
}