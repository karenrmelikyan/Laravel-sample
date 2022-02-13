<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Http\Requests\Category\StoreRequest;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

interface CategoriesRepositoryInterface
{
    public function getCategoriesWithUser(int $countPerPage): Paginator;
    public function saveCategory(StoreRequest $request): bool;
    public function updateCategory(StoreRequest $request, int $id): bool;
    public function deleteCategory(int $id): bool;
}
