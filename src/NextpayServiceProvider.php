<?php

namespace Ssesmaeeli\NextpayGateway;

use Illuminate\Support\ServiceProvider;

class NextpayServiceProvider extends ServiceProvider
{
    const path_config = __DIR__ . '/config/nextpayGetway.php';

    const path_migration = __DIR__ . '/database/migrations/';
        
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            self::path_config , 'nextpayGetway'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(self::path_migration);

        //php artisan vendor:publish --provider=Ssesmaeeli\NextpayServiceProvider --tag=config
        $this->publishes([
            self::path_config => config_path('nextpayGetway.php'),
        ], 'config');

        // php artisan vendor:publish --provider=Ssesmaeeli\NextpayServiceProvider --tag=migrations
        $this->publishes([
            self::path_migration => base_path('database/migrations')
        ], 'migrations');
    }
}
