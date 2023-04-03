<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesHasNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories_has_news')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];

        for ($i = 1; $i <= CategorySeeder::CATEGORY_COUNT; $i++) {
            $count = rand(1, NewsSeeder::NEWS_COUNT);
            for ($j = 1; $j <= $count; $j++) {
                $newsId = rand(1, NewsSeeder::NEWS_COUNT);
                $data[] = [
                    'category_id' => $i,
                    'news_id' => $newsId
                ];
            }
        }

        $data = array_unique($data, SORT_REGULAR);
        sort($data);

        return $data;
    }
}
