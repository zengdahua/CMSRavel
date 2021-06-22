<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        error_reporting(E_ALL^E_WARNING^E_NOTICE);
        Paginator::useTailwind();

        \Route::macro('manage', function ($class, $name = '') {
            return (new \Modules\Common\Util\Route($class, $name));
        });

        app_hook('service', 'app', 'extend');
    }
}
