<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 5/31/2017
     * Time: 5:35 PM
     */

    namespace ShawnSandy\Bluelines;

    use Illuminate\Foundation\AliasLoader;
    use Illuminate\Support\ServiceProvider;
    use ShawnSandy\Dash\Builder\GenerateFormsFields;
    use ShawnSandy\Dash\DashServicesProvider;
    use ShawnSandy\Extras\ExtrasFacade;
    use ShawnSandy\Extras\ExtrasServicesProvider;

    class PackagesProvider extends ServiceProvider
    {


        public function register() {

            $this->app()->register(DashServicesProvider::class);

            $this->app()->register(ExtrasServicesProvider::class);

            $aliases = AliasLoader::getInstance();

            $aliases->alias('DashForms', GenerateFormsFields::class);

            $this->alias('Extras', ExtrasFacade::class);

        }

    }
