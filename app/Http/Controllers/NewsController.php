<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Source;
use Database\Seeders\NewsSeeder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = app(News::class);

        return view('news.index', [
            'newsList' => $news->getNews()
        ]);
    }

    public function show(int $id): View|RedirectResponse
    {
        if ($id == 0 || $id > NewsSeeder::NEWS_COUNT) {
            return redirect(route('news.index'));
        }

        $news = app(News::class);
        $sources = app(Source::class);
        return view('news.show', [
            'news' => $news->getNewsById($id),
            'sources' => $sources->getSourceByNewsId($id)
        ]);
    }
}
