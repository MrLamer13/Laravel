<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class CategoryController extends Controller
{
    private const CATEGORY_COUNT = 5;
    private const COUNT_NEWS = 4;
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('ru_RU');;
    }

    public function index(): View
    {
        $categories = $this->getCategories(self::CATEGORY_COUNT, $this->faker);

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function show(int $id): View|Redirector
    {
        if ($id == 0 || $id > self::CATEGORY_COUNT) {
            return redirect(route('categories.index'));
        }

        $category = $this->getCategories(1, $this->faker);
        $category[1]['news'] = $this->getNews(self::COUNT_NEWS, $this->faker);

        return view('categories.show', [
            'category' => $category
        ]);
    }

    public function showAll(): View
    {
        $categories = $this->getCategories(self::CATEGORY_COUNT, $this->faker);
        for ($i = 1; $i <= self::CATEGORY_COUNT; $i++) {
            $categories[$i]['news'] = $this->getNews(self::COUNT_NEWS, $this->faker);
        }

        return view('categories.showAll', [
            'categories' => $categories
        ]);
    }
}
