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
        $content = Blueline::orderBy("id", "DESC")->paginate(20);

        return view("bluelines::index", compact("content"));

    }

    public function create()
    {
        return view("bluelines::create");
    }

    public function store(BluelineRequest $request)
    {

        $data = $request->all();
        $data['author_id'] = 1;
        $data["featured_image"] = $request->upload();


        if ($post = Blueline::create($data)) {

            $request->syncRelated($post);

            $request->createOrUpdateSlug($post);

            return redirect("/bluelines/posts/{$post->id}/edit")->with('success', "Your post {$post->title} was  created");

        }

        return back()->with('error', "Sorry your post was not saved, please try again.");

    }


    public function edit($post_id)
    {

        $post = Blueline::where("id", $post_id)->with("categories", "tags")->first();

        return view("bluelines::edit", compact("post"));

    }


    public function update(BluelineRequest $request, $post_id)
    {

//            dd($request->all());

        $data = $request->input();
        $data['featured_image'] = $request->upload();


        if ($post = Blueline::updateOrCreate(["id" => $post_id], $data)):

            $request->syncRelated($post);

            $request->createOrUpdateSlug($post);

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
