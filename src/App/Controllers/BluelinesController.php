<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 5/30/2017
     * Time: 10:59 PM
     */

    namespace ShawnSandy\Bluelines\App\Controllers;


    use Illuminate\Routing\Controller;
    use Illuminate\Support\Facades\URL;
    use Request;
    use ShawnSandy\Bluelines\App\Blueline;
    use ShawnSandy\Bluelines\App\BluelinesCategory;
    use ShawnSandy\Bluelines\App\BluelinesTag;
    use ShawnSandy\Bluelines\App\Request\BluelineRequest;

    class BluelinesController extends Controller
    {

        public function index()
        {
            $content = Blueline::paginate(20);

            $categories = BluelinesCategory::all();

            $tags = BluelinesTag::all();

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

        public function edit($post_id)
        {

            $post = Blueline::find($post_id);

            return view("bluelines::edit", compact("post"));

        }

        public function update($post_id)
        {

            if ($post = Blueline::updateOrCreate(["id" => $post_id], request::input())):
                return back()->with("success", "Your post has been updates");
            endif;

            return back()->with("error", "Sorry your post was not updates");

        }

        public function destroy($post_id)
        {
            if ($post = Blueline::destroy($post_id)):
                back()->with("success", "Your post has beend deleted");
            endif;

            return back()->with("error", "Sorry you post was not deleted!");
        }


    }
