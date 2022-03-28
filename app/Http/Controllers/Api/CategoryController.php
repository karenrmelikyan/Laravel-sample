<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::get(), 200);
    }

    public function getById(int $id)
    {
        return response()->json(Category::find($id), 200);
    }

    public function save(Request $request)
    {
        $category = new Category($request->all());
        $category->save();

        return response()->json($category, 201);
    }

    public function update(Request $request, int $id)
    {
        $category = Category::find($id);
        $category->update($request->all());

        return response()->json($category, 200);
    }

    public function delete(int $id)
    {
        $category = Category::find($id);
        $category->delete();

        return response()->json('', 204);
    }
}
