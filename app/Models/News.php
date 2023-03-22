<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews(array $columns = ['*']): Collection
    {
        return DB::table($this->table)->get($columns);
    }

    public function getNewsById(int $id, array $columns = ['*']): mixed
    {
        return DB::table($this->table)->find($id, $columns);
    }
}
