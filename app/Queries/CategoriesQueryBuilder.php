<?php

namespace App\Queries;

use App\Models\Category;
use App\Queries\Contracts\CategoriesQuery;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class CategoriesQueryBuilder implements CategoriesQuery
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Category::query();
    }

    public function getCategories(): Collection|LengthAwarePaginator
    {
        return $this->model
            ->paginate(config('pagination.admin.categories'));
    }

    public function getCategoriesWithNews(): Collection|LengthAwarePaginator
    {
        return $this->model
            ->with('news')
            ->paginate(config('pagination.categories'));
    }


    public function create(array $data): Category|bool
    {
        return Category::create($data);
    }

    public function update(Category $category, array $data): bool
    {
        return $category->fill($data)->save();
    }
}
