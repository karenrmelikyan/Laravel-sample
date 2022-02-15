<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Repositories\CategoriesRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Http\Requests\Category\StoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CategoriesRepository implements CategoriesRepositoryInterface
{
    public function __construct(private Category $model)
    {
       //
    }

    public function getCategoriesWithUser(int $countPerPage): Paginator
    {
        return $this->model
            ->where('user_id', Auth::id())
            ->with('user')
            ->paginate($countPerPage);
    }

    public function saveCategory(StoreRequest $request): bool
    {
        $this->model->user_id = Auth::id();
        $this->model->name = $request->input('category_name');

        try {
            $this->model->save();
        } catch (\Exception $ex) {
            return false;
        }

        return true;
    }

    public function updateCategory(StoreRequest $request, int $id): bool
    {
        try {
            $model = $this->model->find($id);
            $model->name = $request->input('update');
            $model->save();
        } catch(\Exception $ex) {
            return false;
        }

        return true;
    }

    public function deleteCategory(int $id): bool
    {
        if (! $this->model->find($id)->delete()) {
             return false;
        }

        return true;
    }
}


