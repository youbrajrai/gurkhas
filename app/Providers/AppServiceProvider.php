<?php

namespace App\Providers;

use Pages\Models\Document;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        try {
            View::share('documents', Document::all());
            Paginator::useBootstrap();
        } catch (\PDOException $exception) {
            error_log($exception->getMessage());
        }
    }
}
