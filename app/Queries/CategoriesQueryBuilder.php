<?php

namespace App\Queries;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class CategoriesQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Category::query();
    }

    public function getCategories(): Collection|Builder
    {
        return $this->model->with('news')->get();
    }


    public function create(array $data): Category|bool
    {

    }

    public function update(Category $category, array $data): bool
    {

    }
}
