<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 5/30/2017
     * Time: 10:59 PM
     */

    namespace ShawnSandy\Bluelines\App\Controllers;


    use Illuminate\Routing\Controller;
    use ShawnSandy\Bluelines\App\Blueline;

    class BluelinesController extends Controller
    {

        public function index()
        {
            $content = Blueline::paginate(20);

            $categories;

            $tags;

            return view("bluelines::index", compact("content", "categories", "tags"));
        }

        public function create()
        {

            return view("bluelines::create");
        }

        public function store()
        {
        }

        public function show()
        {
        }

        public function edit()
        {
        }

        public function update()
        {
        }

        public function destroy()
        {
        }


    }
