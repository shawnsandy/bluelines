<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 6/21/2017
     * Time: 10:47 PM
     */

    namespace ShawnSandy\Bluelines\App\Controllers;


    use Illuminate\Routing\Controller;
    use ShawnSandy\Bluelines\App\Blueline;

    class PostsController extends Controller
    {

        public function index()
        {
            $posts = Blueline::latestPaginated(5);
            return view("bluelines::blog.collection", compact("posts") );
        }

        /**
         * Route model binding with eager loading
         * @param \ShawnSandy\Bluelines\App\Blueline $blog
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function show(Blueline $blog)
        {
            $blog->load("categories", "tags");
            return view("bluelines::blog.single", compact("blog"));
        }

    }
