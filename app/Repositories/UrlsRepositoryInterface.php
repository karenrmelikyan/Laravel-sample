<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;

interface UrlsRepositoryInterface
{
    public function getUrlsWithCategory(int $category_id, int $countPerPage): Paginator;
    public function saveUrl(string $path, int $category_id): bool;
    public function updateUrl(string $path, int $id): bool;
    public function deleteUrl(int $id): bool;
}
