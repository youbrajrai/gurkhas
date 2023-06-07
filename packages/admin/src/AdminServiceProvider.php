<?php

namespace Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Load Views and Routes
        $this->loadViewsFrom(__DIR__ . '/views', 'Admin');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }


}
