<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 5/31/2017
     * Time: 5:35 PM
     */

    namespace ShawnSandy\Bluelines;


    use Illuminate\Support\ServiceProvider;

    class PackagesProvider extends ServiceProvider
    {


        public function register() {

            $this->app()->register(\ShawnSandy\Dash\DashServicesProvider::class);

            $this->app()->register(\ShawnSandy\Extras\ExtrasServicesProvider::class);

            $aliases = \Illuminate\Foundation\AliasLoader::getInstance();

            $aliases->alias('DashForms', \ShawnSandy\Dash\Builder\GenerateFormsFields::class);

            $this->alias('Extras', \ShawnSandy\Extras\ExtrasFacade::class);

        }

    }
