<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function getCategories(array $columns = ['*']): Collection
    {
        return DB::table($this->table)->get($columns);
    }

    public function getCategoryById(int $id, array $columns = ['*']): ?Collection
    {
        return DB::table($this->table)
            ->join('categories_has_news as chn', 'categories.id', '=', 'chn.category_id')
            ->leftJoin('news', 'chn.news_id', '=', 'news.id')
            ->select('news.*', 'categories.title as category_title')
            ->where('chn.category_id', '=', $id)
            ->get($columns);
    }

    public function getCategoryTitleByNews(array $columns = ['*']): ?Collection
    {
        return DB::table($this->table)
            ->join('categories_has_news as chn', 'categories.id', '=', 'chn.category_id')
            ->leftJoin('news', 'chn.news_id', '=', 'news.id')
            ->select('news.id as news_id', 'categories.title')
            ->get($columns);
    }
}
