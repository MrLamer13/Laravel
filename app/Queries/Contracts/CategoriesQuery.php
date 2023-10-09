<?php

namespace App\Queries\Contracts;

use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CategoriesQuery
{
    public function getCategories(): Collection|LengthAwarePaginator;

    public function getCategoriesWithNews(): Collection|LengthAwarePaginator;

    public function create(array $data): Category|bool;

    public function update(Category $category, array $data): bool;
}
