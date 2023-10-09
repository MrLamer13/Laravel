<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $table = 'resources';

    protected $fillable = [
      'resource',
    ];

    /*
     * https://rss.stopgame.ru/rss_news.xml
     * https://rss.stopgame.ru/articles.xml
     * https://overclockers.ru/rss/softnews.rss
     * https://overclockers.ru/rss/hardnews.rss
     */
}
