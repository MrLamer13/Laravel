<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Queries\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class NewsController extends Controller
{
    public function index(NewsQueryBuilder $builder): View
    {
        return view('news.index', [
            'newsList' => $builder->getAllNews()
        ]);
    }

    public function show(News $news): View|RedirectResponse
    {
        return view('news.show', [
            'news' => $news
        ]);
    }
}
