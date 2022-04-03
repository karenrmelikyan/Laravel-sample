<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryStoreRequest;
use App\Http\Requests\Api\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => Category::get(),
        ], 200);
    }

    /**
     * Show one element by ID
    */
    public function show(int $id): JsonResponse
    {
        $category = Category::find($id);
        if (is_null($category)) {
            return response()->json(['success' => false, 'message' => 'Not found ID ' . $id], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $category,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request): JsonResponse
    {
        try{
            $category = new Category($request->all());
            $category->save();
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => 'Something went wrong with save category'], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $category,
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, int $id): JsonResponse
    {
        $category = Category::find($id);
        if (is_null($category)) {
            return response()->json(['success' => false, 'message' => 'Not found ID '. $id], 404);
        }

        $category->update($request->all());

        return response()->json([
                'success' => true,
                'data' => $category,
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $category = Category::find($id);
        if (is_null($category)) {
            return response()->json(['success' => false, 'message' => 'Not found ID '. $id], 404);
        }

        $category->delete();

        return response()->json([], 204);
    }
}
