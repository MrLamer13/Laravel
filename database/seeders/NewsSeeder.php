<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    public const NEWS_COUNT = 50;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];

        for ($i = 0; $i < self::NEWS_COUNT; $i++) {
            $data[] = [
                'title' => fake('ru_RU')->jobTitle(),
                'author' => fake('ru_RU')->userName(),
                'image' => fake()->imageUrl(),
                'description' => fake('ru_RU')->realText(200),
                'created_at' => now('Asia/Novokuznetsk'),
                'updated_at' => now('Asia/Novokuznetsk')
            ];
        }

        return $data;
    }
}
