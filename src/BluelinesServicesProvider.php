<?php

namespace ShawnSandy\Bluelines;

use Illuminate\Support\ServiceProvider;
use ShawnSandy\Bluelines\App\Blueline;
use ShawnSandy\Bluelines\App\BluelinesCategory;
use ShawnSandy\Bluelines\App\BluelinesTag;
use Illuminate\Database\Eloquent\Factory;

/**
 * Class Provider
 * @package ShawnSandy\Bluelines
 */
class BluelinesServicesProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {


        /**
         * Package views
         */
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'bluelines');
        $this->publishes(
            [
                __DIR__ . '/resources/views' => resource_path('views/vendor/bluelines'),
            ], 'bluelines-views'
        );

        /**
         * Package assets
         */
        $this->publishes(
            [
                __DIR__ . '/resources/assets/js' => public_path('/assets/bluelines/')
            ], 'bluelines-assets'
        );

        /**
         * Package config
         */
        $this->publishes(
            [
                __DIR__ . '/config/config.php' => config_path('bluelines.php'),
                __DIR__ . '/config/forms/' => config_path('forms/'),
            ],
            'bluelines-config'
        );

        if (!$this->app->runningInConsole()) :
            include_once __DIR__ . '/Helpers/helper.php';
        endif;

        $this->publishes([
            __DIR__ . '/migrations/' => database_path('migrations')
        ], 'bluelines-migrations');

        $this->loadMigrationsFrom(__DIR__ . '/migrations');

        include_once __DIR__. "/components.php";

        view()->composer(
            ["bluelines::partials.forms.post",
                "bluelines::components.post-categories",
                "bluelines::components.post-tags" ],
            function($view) {

            $categories_list = BluelinesCategory::list();
            $tags_list = BluelinesTag::list();

            $view->with(compact("categories_list", "tags_list"));

        });


    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {

        $this->mergeConfigFrom(
            __DIR__ . '/config/config.php', 'bluelines'
        );

        $this->app->bind(
            'Blue', function () {
            return new BluelinesApp();
        });

        $this->registerFactoriesPath(__DIR__.'/factories');
    }

    /**
     * Register factories.
     *
     * @param  string  $path
     * @return void
     */
    protected function registerFactoriesPath($path)
    {
        $this->app->make(Factory::class)->load($path);
    }


}
