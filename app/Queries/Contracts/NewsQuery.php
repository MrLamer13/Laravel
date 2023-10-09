<?php

namespace App\Queries\Contracts;

use App\Models\News;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface NewsQuery
{
    public function getNews(): Collection|LengthAwarePaginator;
    public function getAllNews(): Collection|LengthAwarePaginator;
    public function create(array $data): News|bool;
    public function update(News $news, array $data): bool;
}
