<?php

namespace App\Providers;

use App\Queries\CategoriesQueryBuilder;
use App\Queries\Contracts\CategoriesQuery;
use App\Queries\Contracts\NewsQuery;
use App\Queries\Contracts\SourcesQuery;
use App\Queries\NewsQueryBuilder;
use App\Queries\SourcesQueryBuilder;
use App\Services\Contracts\Parser;
use App\Services\Contracts\Social;
use App\Services\Contracts\Upload;
use App\Services\ParserService;
use App\Services\SocialService;
use App\Services\UploadService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(NewsQuery::class, NewsQueryBuilder::class);
        $this->app->bind(CategoriesQuery::class, CategoriesQueryBuilder::class);
        $this->app->bind(SourcesQuery::class, SourcesQueryBuilder::class);

        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Social::class, SocialService::class);
        $this->app->bind(Upload::class, UploadService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
