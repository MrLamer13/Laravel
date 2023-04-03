<?php

namespace App\Queries;

use App\Models\News;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class NewsQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = News::query();
    }

    public function getNews(): Collection|LengthAwarePaginator
    {
        return $this->model->with('categories')->paginate(config('pagination.admin.news'));
    }

    public function getAllNews(): Collection|LengthAwarePaginator
    {
        return $this->model->where('news.isVisible', '=', '1')->paginate(config('pagination.news'));
    }

    public function create(array $data): News|bool
    {
        return News::create($data);
    }

    public function update(News $news, array $data): bool
    {
        return $news->fill($data)->save();
    }
}
