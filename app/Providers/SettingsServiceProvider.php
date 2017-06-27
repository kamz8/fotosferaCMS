<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Illuminate\Contracts\Cache\Factory;
use App\Options;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param \Illuminate\Contracts\Cache\Factory $cache
     * @param \App\Setting                        $settings
     * 
     * @return void
     */
    public function boot(Factory $cache, Options $settings)
    {
        $settings = $cache->remember('settings', 60, function() use ($settings)
        {
            // Laravel >= 5.2, use 'lists' instead of 'pluck' for Laravel <= 5.1
            return $settings->pluck('value', 'name')->all();
        });

        config()->set('settings', $settings);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
