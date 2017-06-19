<?php

namespace ShawnSandy\Bluelines;

use Illuminate\Support\ServiceProvider;
use ShawnSandy\Bluelines\App\Blueline;
use ShawnSandy\Bluelines\App\BluelinesCategory;
use ShawnSandy\Bluelines\App\BluelinesTag;

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
                __DIR__ . '/resources/assets/js/' => public_path('assets/bluelines/js/'),
                __DIR__ . '/public/assets/' => public_path('assets/')
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

        view()->composer(["bluelines::components.recent-content"], function($view){
            $recent_posts = Blueline::latest(10)->select("title", "id")->get();

            $view->with(compact("recent_posts"));
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
    }


}
