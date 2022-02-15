<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Url\StoreRequest;
use App\Repositories\UrlsRepositoryInterface;

class UrlsController extends Controller
{
    public function __construct(private UrlsRepositoryInterface $repository)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $category_id
     * @return Renderable
     */
    public function show($category_id): Renderable
    {
        $relation = $this->repository->getUrlsWithCategory($category_id, 3);

        // If there doesn't exist some URL in the table, we can't get the category name, that's why we alter $category_name to message.
        isset($relation[0]) ? $category_name = $relation[0]->category->name : $category_name = 'Add some Url for viewing category name';

        return view('dashboards.urls', [
            'paginator' => $relation,
            'category_id' => $category_id,
            'category_name' => $category_name,
            'paginationLinksLimit' => 7,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $this->repository->saveUrl($request);

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->repository->deleteUrl($id);

        return redirect()->back();
    }
}
