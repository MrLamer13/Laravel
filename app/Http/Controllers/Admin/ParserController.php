<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Services\Contracts\ParserInterface;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ParserInterface $parser)
    {
        $link = 'https://overclockers.ru/rss/softnews.rss';
//        $link = 'https://overclockers.ru/rss/hardnews.rss';

        $load = $parser
            ->setLink($link)
            ->getParserData();


        $category = Category::query()->where('title', '=', $load['title'])->first();

        if ($category === null) {
            $category = Category::create([
                'title' => $load['title'],
                'description' => $load['description'],
                'image' => $load['image'],
                'link' => $load['link'],
            ]);
        }

        foreach ($load['news'] as $newsItem) {
            if (!News::query()->where('guid', '=', $newsItem['guid'])->exists()) {
                $news = News::create([
                    'title' => $newsItem['title'],
                    'image' => $newsItem['enclosure::url'],
                    'description' => $newsItem['description'],
                    'link' => $newsItem['link'],
                    'guid' => $newsItem['guid'],
                    'pub_date' => $newsItem['pubDate'],
                ]);

                if ($news) {
                    $news->categories()->attach($category->id);
                }
            }
        }


//        dd($load, $category, $category->id);
    }
}
