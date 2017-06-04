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
    use ShawnSandy\Bluelines\App\Request\BluelineRequest;

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

        public function store(BluelineRequest $request)
        {
            // dd($request->all());
            $data = $request->all();
            $data['author_id'] = 1;
//            dd($data);
            if ($post = Blueline::create($data)) {
                back()->with('success', "Your post {$post->title} was  created");
            }
            back()->with('error', "Sorry you post was not save please try again");
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
