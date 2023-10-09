<?php

namespace App\Queries;

use App\Models\News;
use App\Queries\Contracts\NewsQuery;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

final class NewsQueryBuilder implements NewsQuery
{
    private Builder $model;

    public function __construct()
    {
        $this->model = News::query();
    }

    public function getNews(): Collection|LengthAwarePaginator
    {
        return $this->model
            ->with('categories')
            ->orderByDesc('news.created_at')
            ->paginate(config('pagination.admin.news'));
    }

    public function getAllNews(): Collection|LengthAwarePaginator
    {
        if (Auth::id()) {
            return $this->model
                ->orderByDesc('news.created_at')
                ->paginate(config('pagination.news'));
        }

        return $this->model
            ->where('news.isVisible', '=', '1')
            ->orderByDesc('news.created_at')
            ->paginate(config('pagination.news'));
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
