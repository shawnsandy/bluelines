<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 2/22/2017
     * Time: 10:03 PM
     */

    namespace ShawnSandy\Bluelines;

    use ShawnSandy\Dash\Dash;

    class BluelinesApp
    {

        public function routes(){
            require  __DIR__.'/routes.php';
        }


        public function dash() {
            return app(Dash::class);
        }

    }
