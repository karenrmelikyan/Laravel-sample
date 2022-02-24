<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Repositories\CategoriesRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
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

    public function saveCategory(string $categoryName): bool
    {
        $this->model->user_id = Auth::id();
        $this->model->name = $categoryName;

        try {
            $this->model->save();
        } catch (\Exception $ex) {
            return false;
        }

        return true;
    }

    public function updateCategory(string $categoryName, int $id): bool
    {
        try {
            $model = $this->model->find($id);
            $model->name = $categoryName;
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


