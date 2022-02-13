<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Http\Requests\Url\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

interface UrlsRepositoryInterface
{
    public function getUrlsWithCategory(int $category_id, int $countPerPage): Paginator;
    public function saveUrl(StoreRequest $request): bool;
    public function updateUrl(StoreRequest $request, int $id): bool;
    public function deleteUrl(int $id): bool;
}
