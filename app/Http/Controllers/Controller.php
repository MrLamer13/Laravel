<?php

namespace App\Http\Controllers;

use Faker\Generator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getCategories(int $count, Generator $faker): array
    {
        $categories = [];

        for ($i = 1; $i <= $count; $i++) {
            $categories[$i] = ['title' => $faker->sentence()];
        }

        return $categories;
    }

    public function getNews(int $count, Generator $faker): array
    {
        $news = [];

        for ($i = 1; $i <= $count; $i++) {
            $news[$i] = $this->getOneNews($faker);
        }

        return $news;
    }

    public function getOneNews(Generator $faker): array
    {
        return [
            'title' => $faker->sentence(),
            'author' => $faker->userName(),
            'status' => 'DRAFT',
            'description' => $faker->realText(200),
            'created_at' => now('Asia/Novokuznetsk')
        ];
    }
}
