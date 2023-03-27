<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    public const SOURCE_LIMIT = 5;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sources')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];

        for ($i = 1; $i <= NewsSeeder::NEWS_COUNT; $i++) {
            $count = rand(1, self::SOURCE_LIMIT);
            for ($j = 0; $j < $count; $j++) {
                $data[] = [
                    'news_id' => $i,
                    'title' => fake('ru_RU')->realText(25),
                    'url' => fake()->url(),
                    'created_at' => now('Asia/Novokuznetsk'),
                    'updated_at' => now('Asia/Novokuznetsk')
                ];
            }
        }

        return $data;
    }
}
