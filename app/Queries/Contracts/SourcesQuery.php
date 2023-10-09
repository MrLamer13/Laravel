<?php

namespace App\Queries\Contracts;

use App\Models\News;
use App\Models\Source;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

interface SourcesQuery
{
    public function getSources(News $news): Collection|Builder;

    public function create(array $data): Source|bool;

    public function update(Source $source, array $data): bool;
}
