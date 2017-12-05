<?php

namespace Thuyennv\Showtimes;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class ShowtimesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $router->aliasMiddleware('showtimes', Thuyennv\Showtimes\Middleware\ShowtimesMiddleware::class);

        $this->publishes([
            __DIR__.'/Config/showtimes.php' => config_path('showtimes.php'),
        ], 'showtimes_config');

        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

        $this->loadTranslationsFrom(__DIR__ . '/Translations', 'showtimes');

        $this->publishes([
            __DIR__ . '/Translations' => resource_path('lang/vendor/showtimes'),
        ]);

        $this->loadViewsFrom(__DIR__ . '/Views', 'showtimes');

        $this->publishes([
            __DIR__ . '/Views' => resource_path('views/vendor/showtimes'),
        ]);

        $this->publishes([
            __DIR__ . '/Assets' => public_path('vendor/showtimes'),
        ], 'showtimes_assets');

        if ($this->app->runningInConsole()) {
            $this->commands([
                \Thuyennv\Showtimes\Commands\ShowtimesCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/showtimes.php', 'showtimes'
        );
    }
}
