<?php
/**
 * Created by PhpStorm.
 * User: shawnsandy
 * Date: 5/31/17
 * Time: 3:43 PM
 */

namespace ShawnSandy\Bluelines;


use Illuminate\Support\ServiceProvider;
use ShawnSandy\Dash\Builder\GenerateFormsFields;

class ServicesBridge extends ServiceProvider
{

    public function boot() {

    }

    public function register() {

        $this->app()->register(\ShawnSandy\Dash\DashServicesProvider::class);

        $this->app()->register(\ShawnSandy\Extras\ExtrasServicesProvider::class);

        $aliases = \Illuminate\Foundation\AliasLoader::getInstance();

        $aliases->alias('DashForms', \ShawnSandy\Dash\Builder\GenerateFormsFields::class);

        $this->alias('Extras', \ShawnSandy\Extras\ExtrasFacade::class);

    }

}
