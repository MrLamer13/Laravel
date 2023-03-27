<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public const CATEGORY_COUNT = 10;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];

        for ($i = 0; $i < self::CATEGORY_COUNT; $i++) {
            $data[] = [
                'title' => fake('ru_RU')->jobTitle(),
                'description' => fake('ru_RU')->realText(100),
                'created_at' => now('Asia/Novokuznetsk'),
                'updated_at' => now('Asia/Novokuznetsk')
            ];
        }

        return $data;
    }
}
