<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\BookRepository\BookRepositoryInterface::class,
            \App\Repositories\BookRepository\BookRepository::class
        );

        $this->app->bind(
            \App\Repositories\StoreRepository\StoreRepositoryInterface::class,
            \App\Repositories\StoreRepository\StoreRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
