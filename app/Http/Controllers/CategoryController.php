<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\CategoriesRepositoryInterface;
use App\Repositories\Eloquent\CategoriesRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Category\StoreRequest;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param CategoriesRepository $repository
     */
    public function __construct(private CategoriesRepositoryInterface $repository)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('dashboards.categories', [
             'paginator' => $this->repository->getCategoriesWithUser(3),
             'paginationLinksLimit' => 3,
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
        $this->repository->saveCategory($request->input('category_name'));

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(StoreRequest $request, int $id): RedirectResponse
    {
        $this->repository->updateCategory($request->input('update'), $id);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->repository->deleteCategory((int) $id);

        return redirect()->back();
    }
}
