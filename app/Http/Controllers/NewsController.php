<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Redirector;

class NewsController extends Controller
{
    private const COUNT_NEWS = 9;
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('ru_RU');;
    }

    public function index(): View
    {
        $news = $this->getNews(self::COUNT_NEWS, $this->faker);
        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show(int $id): View|Redirector
    {
        if ($id == 0 || $id > self::COUNT_NEWS) {
            return redirect(route('news.index'));
        }

        $news = $this->getOneNews($this->faker);
        return view('news.show', [
            'news' => $news
        ]);
    }
}
