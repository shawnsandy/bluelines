<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 2/22/2017
     * Time: 10:03 PM
     */

    namespace ShawnSandy\Bluelines;


    use ShawnSandy\Dash\Dash;
    use ShawnSandy\Bluelines\App\Blueline;


    class BluelinesApp
    {



        public function routes(){
            require  __DIR__.'/routes.php';
        }


        public function dash() {
            return app(Dash::class);
        }

        public function recentPosts($limit = 5) {
           return Blueline::latest()->take($limit)->select("title", "id", "updated_at")->get();
        }

        public function recentPostsUpdates($limit = 5) {
            return Blueline::latest('updated_at')->take($limit)->select("title", "id", "updated_at")->get();
        }

    }
