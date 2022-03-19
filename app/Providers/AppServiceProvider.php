<?php

namespace App\Providers;

use App\Repositories\CategoriesRepositoryInterface;
use App\Repositories\Eloquent\CategoriesRepository;
use App\Repositories\Eloquent\UrlsRepository;
use App\Repositories\UrlsRepositoryInterface;
use App\Services\Notifiers\NotifierInterface;
use App\Services\Notifiers\TelegramNotifier;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoriesRepositoryInterface::class, CategoriesRepository::class);
        $this->app->bind(UrlsRepositoryInterface::class, UrlsRepository::class);
        $this->app->bind(NotifierInterface::class, TelegramNotifier::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
