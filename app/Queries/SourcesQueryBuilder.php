<?php

namespace App\Queries;

use App\Models\News;
use App\Models\Source;
use App\Queries\Contracts\SourcesQuery;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class SourcesQueryBuilder implements SourcesQuery
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Source::query();
    }

    public function getSources(News $news): Collection|Builder
    {
        return $this->model
            ->where('sources.news_id', '=', $news->id)
            ->get();
    }

    public function create(array $data): Source|bool
    {
        return Source::create($data);
    }

    public function update(Source $source, array $data): bool
    {
        return $source->fill($data)->save();
    }
}
