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

        $data = $request->all();
        $data['author_id'] = 1;

        if ($request->hasFile("featured_image") && $request->file("featured_image")->isValid()) {

            $data['featured_image'] = $request->file('featured_image')->store('img', 'public');

        }

        if ($post = Blueline::create($data)) {

            back()->with('success', "Your post {$post->title} was  created");

        }


        back()->with('error', "Sorry your post was not saved, please try again.");

    }

    public function edit($post_id)
    {

        $post = Blueline::find($post_id);

        return view("bluelines::edit", compact("post"));

    }

    public function update(BluelineRequest $request, $post_id)
    {

//            dd($request->all());

        $data = $request->input();

        if ($request->hasFile("featured_image") && $request->file("featured_image")->isValid()) {

            $data['featured_image'] = $request->file('featured_image')->store('img', 'public');


        }

        if ($post = Blueline::updateOrCreate(["id" => $post_id], $data)):

            if (request()->has("category"))
                $post->categories()->sync($request->input("category"));

            if (request()->has("tags") )
                $post->tags()->sync(request()->input("tags"));

            return back()->with("success", "Your post has been updated!");

        endif;

        return back()->with("error", "Sorry your post was not updated");

    }

    public function destroy($post_id)
    {
        if ($post = Blueline::destroy($post_id)):
            back()->with("success", "Your post has beend deleted");
        endif;

        return back()->with("error", "Sorry you post was not deleted!");
    }


}
