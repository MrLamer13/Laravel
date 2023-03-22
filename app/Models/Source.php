<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Source extends Model
{
    use HasFactory;

    protected $table = 'sources';

    public function getSourceByNewsId(int $newsId, array $columns = ['*']): Collection
    {
        return DB::table($this->table)
            ->where('news_id', '=', $newsId)
            ->get($columns);
    }
}
