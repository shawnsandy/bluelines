<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 6/13/2017
     * Time: 4:06 PM
     */

    namespace ShawnSandy\Bluelines\App\Repositories;


    use ShawnSandy\Bluelines\App\Blueline;
    use ShawnSandy\Bluelines\App\BluelinesCategory;
    use ShawnSandy\Bluelines\App\BluelinesTag;

    class Content
    {

        public function __construct()
        {
        }


        public function category($category_id = null)
        {

            if (is_null($category_id))
                $category_id = request()->has("category") ? request("category") : 1;

            $category = BluelinesCategory::with('content')->where('id', $category_id)->get();

            return $category;

        }

        public function tag($tags_id = null)
        {

            if (is_null($tags_id))
                $tags_id = request()->has("tag") ? request("tag") : 1;

            $post = BluelinesTag::with("content")->whereIn('id', $tags_id)->get();

            return $post;

        }


    }
