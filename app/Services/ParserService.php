<?php

namespace App\Services;

use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use App\Services\Contracts\Parser;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function load(): void
    {
        $xml = XmlParser::load($this->link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate,enclosure::url]'
            ],
        ]);

        $category = Category::query()
            ->where('title', '=', $data['title'])
            ->first();

        if ($category === null) {
            $category = Category::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'description' => $data['description'],
                'image' => $data['image'],
                'link' => $data['link'],
            ]);
        }

        foreach ($data['news'] as $newsItem) {
            if (
                !News::query()
                    ->where('guid', '=', $newsItem['guid'])
                    ->exists()
            ) {
                $news = News::create([
                    'title' => $newsItem['title'],
                    'slug' => Str::slug($newsItem['title']),
                    'image' => $newsItem['enclosure::url'],
                    'description' => $newsItem['description'],
                    'link' => $newsItem['link'],
                    'guid' => $newsItem['guid'],
                    'pub_date' => $newsItem['pubDate'],
                ]);

                if ($news) {
                    $news->categories()->attach($category->id);

                    Source::create([
                        'news_id' => $news->id,
                        'title' => $category->title,
                        'url' => $news->link
                    ]);
                }
            }
        }
    }
}
