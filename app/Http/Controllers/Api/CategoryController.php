<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Category::get(), 200);
    }

    /**
     * Show one element by ID
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return response()->json(Category::find($id), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try{
            $category = new Category($request->all());
            $category->save();
        } catch (\Exception $ex) {
            return response()->json(['error' => true, 'message' => 'Something went wrong with save category'], 404);
        }

        return response()->json($category, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $category = Category::find($id);

        // If not found by Id
        if (is_null($category)) {
            return response()->json(['error' => true, 'message' => 'Not found ID '. $id], 404);
        }

        $category->update($request->all());

        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $category = Category::find($id);

        // If not found by Id
        if (is_null($category)) {
            return response()->json(['error' => true, 'message' => 'Not found ID '. $id], 404);
        }

        $category->delete();

        return response()->json([], 204);
    }
}
