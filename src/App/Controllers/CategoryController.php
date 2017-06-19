<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 6/2/2017
     * Time: 8:35 PM
     */

    namespace ShawnSandy\Bluelines\App\Controllers;


    use Illuminate\Routing\Controller;
    use ShawnSandy\Bluelines\App\BluelinesCategory;
    use ShawnSandy\Bluelines\App\Request\CategoryRequest;

    class CategoryController extends Controller
    {

        public function store(CategoryRequest $request) {

            $data = $request->all();

           if($request->hasFile("image") && $request->file("image")->isValid()) {
               $data["image"] = $request->file('image')->store('img', 'public');
           }

          if(BluelinesCategory::create($data))
            return  back()->with('success', "  Category created");

         return back()->with("error", "Ooops we failed to save category");

        }

        public function edit() {

        }

        public function update() {

        }

        public function destroy($cat_id) {

            if(BluelinesCategory::destroy($cat_id))
              return back()->with("success", "Your Category has been deleted.");

            return back()->with("error", "Sorry we failed to delete this category");

        }

    }
