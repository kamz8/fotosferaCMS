<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        return \App\Http\Helpers::class;
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        require app_path('Http/helpers.php');
    }
}
