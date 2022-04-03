<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UrlUpdateRequest;
use App\Models\URL;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UrlStoreRequest;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show($category_id): JsonResponse
    {
        $urls = URL::where('category_id', $category_id)->get();
        if (is_null($urls)) {
            return response()->json(['success' => false, 'message' => 'Not found ID ' . $category_id], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $urls,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UrlStoreRequest $request): JsonResponse
    {
        try{
            $url = new URL($request->all());
            $url->save();
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => 'Something went wrong with save url'], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $url,
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UrlUpdateRequest $request, $id): JsonResponse
    {
        $url = URL::find($id);
        if (is_null($url)) {
            return response()->json(['success' => false, 'message' => 'Not found ID '. $id], 404);
        }

        $url->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $url,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $url = url::find($id);
        if (is_null($url)) {
            return response()->json(['success' => false, 'message' => 'Not found ID '. $id], 404);
        }

        $url->delete();

        return response()->json([], 204);
    }
}
