<?php

namespace Yassir3wad\NovaTheme;

use Yassir3wad\NovaTheme\Models\Theme;
use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Yassir3wad\NovaTheme\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'nova-theme');

        $this->app->booted(function () {
            $this->routes();
        });

        $this->loadMigrations();

        $this->publishAssets();

        Nova::serving(function (ServingNova $event) {
            if (($theme = Theme::getDefaultTheme()) && file_exists(public_path("vendor/themes/$theme->code.css")))
                Nova::style("theme-$theme->code", public_path("vendor/themes/$theme->code.css"));
        });

        Nova::resources([
            \Yassir3wad\NovaTheme\Resources\Theme::class
        ]);
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
            ->prefix('nova-vendor/nova-theme')
            ->group(__DIR__ . '/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function loadMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    private function publishAssets()
    {
        $this->publishes([
            __DIR__ . '/../public/themes' => public_path('vendor/themes'),
        ], 'assets');
    }

}
