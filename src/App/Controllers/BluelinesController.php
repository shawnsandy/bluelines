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
    use ShawnSandy\Bluelines\App\Request\BluelineFormRequest;

    class BluelinesController extends Controller
    {

        public $post_type = "post";


        public function __construct() {

        }

        public function index()
        {
            $content = Blueline::latestPaginated();

            return view("bluelines::index", compact("content"));

        }

        public function create()
        {
            return view("bluelines::create");
        }

        public function store(BluelineFormRequest $request)
        {



            if ($post = $request->save($this->post_type)) {
                return back()
                    ->with('success', "Congrats your post \" $post->title \" was  created! Would you like to add another post?");

            }

            return back()->with('error', "Sorry your post was not saved, please try again.");

        }


        public function edit($post_id)
        {

            $post = Blueline::single($post_id);

            return view("bluelines::edit", compact("post"));

        }


        public function update(BluelineFormRequest $request, $post_id)
        {

            if ($post = $request->update($post_id, $this->post_type)) :

                return back()->with("success", "Your post has been updated!");

            endif;

            return back()->with("error", "Sorry your post was not updated");

        }

        public function destroy($post_id)
        {
            if (Blueline::destroy($post_id)):
                back()->with("success", "Your post has been deleted");
            endif;

            return back()->with("error", "Sorry you post was not deleted!");
        }


    }
