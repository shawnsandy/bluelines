<?php

    namespace ShawnSandy\Bluelines;

    use Illuminate\Support\ServiceProvider;

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
                [__DIR__ . '/config/config.php' => config_path('bluelines.php')],
                'bluelines-config'
            );

            if (!$this->app->runningInConsole()) :
                include_once __DIR__ . '/Helpers/helper.php';
            endif;

            $this->publishes([
                __DIR__.'/migrations/' => database_path('migrations')
            ], 'bluelines-migrations');

            $this->loadMigrationsFrom(__DIR__ . '/migrations');

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
                'Bluelines', function () {
                return new Bluelines();
            }
            );
        }


    }
