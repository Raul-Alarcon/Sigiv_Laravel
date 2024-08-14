<?php

namespace App\Services;
use App\Models\Category;
use Illuminate\Validation\Rules\In;

class CategoryService
{ 
    public function getAll(Int $limit = 10)
    {
        return Category::paginate($limit);
    }

    public function create($request)
    {
        return Category::create($request->all());
    }

    public function findById($id)
    {
        return Category::find($id);
    }

    public function updateStatus($id)
    {
        $category = Category::find($id);
        $category->status = !$category->status;
        $category->update(); 
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