<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 5/30/2017
 * Time: 10:59 PM
 */

namespace ShawnSandy\Bluelines\App\Controllers;


use Carbon\Carbon;
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

        if ($request->hasFile("featured_image") && $request->file("featured_image")->isValid()) {

            $data['featured_image'] = $request->file('featured_image')->store('img', 'public');

        }

        if ($post = Blueline::create($data)) {

            $this->sync($post);

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

        if ($request->hasFile("featured_image") && $request->file("featured_image")->isValid()) {

            $data['featured_image'] = $request->file('featured_image')->store('img', 'public');


        }

        if ($post = Blueline::updateOrCreate(["id" => $post_id], $data)):

            $this->sync($post);

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

    /**
     * @param $post
     */
    private function sync($post): void
    {

        if (!request()->has("slug")):
            $slug = str_slug($post->title . "-" . $post->created_at->toDateString());
            Blueline::updateOrCreate(["id" => $post->id], ["slug" => $slug]);
        endif;

        if (request()->has("categories"))
            $post->categories()->sync(request()->input("categories"));

        if (request()->has("tags"))
            $post->tags()->sync(request()->input("tags"));

    }


}
