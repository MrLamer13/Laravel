<?php

namespace App\Providers;

use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\SourcesQueryBuilder;
use App\Services\Contracts\ParserInterface;
use App\Services\Contracts\SocialInterface;
use App\Services\Contracts\UploadInterface;
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
        $this->app->bind(NewsQueryBuilder::class);
        $this->app->bind(CategoriesQueryBuilder::class);
        $this->app->bind(SourcesQueryBuilder::class);

        $this->app->bind(ParserInterface::class, ParserService::class);
        $this->app->bind(SocialInterface::class, SocialService::class);
        $this->app->bind(UploadInterface::class, UploadService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
