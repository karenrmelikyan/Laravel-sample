<?php

namespace App\Http\Controllers\Api;

use App\Models\URL;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($category_id): JsonResponse
    {
        $urls = URL::where('category_id', $category_id)->get();

        return response()->json($urls, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)//: JsonResponse
    {
        try {
            $url = new Url($request->all());
            $url->save();
        } catch(\Exception $ex) {
            return response()->json(['error' => true, 'message' => 'Something went wrong with save url'], 404);
        }

        return response()->json($url, 201);
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
        $url = URL::find($id);

        if (is_null($url)) {
            return response()->json(['error' => true, 'message' => 'Not found ID '. $id], 404);
        }

        $url->update($request->all());

        return response()->json($url, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $url = URL::find($id);

        if (is_null($url)) {
            return response()->json(['error' => true, 'message' => 'Not found ID '. $id], 404);
        }

        $url->delete();

        return response()->json($url, 204);
    }
}
