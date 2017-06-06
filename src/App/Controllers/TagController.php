<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 6/4/2017
     * Time: 5:14 PM
     */

    namespace ShawnSandy\Bluelines\App\Controllers;


    use Illuminate\Routing\Controller ;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Http\Request;
    use ShawnSandy\Bluelines\App\BluelinesTag;

    class TagController extends Controller
    {


        public function store(Request $request) {

            $validator = Validator::make($request->all(), [
               'tag_name' => "required|max:50",
            ]);

            if($validator->fails())
               return redirect('/bluelines?tag_name')->withErrors($validator)
                    ->withInput();



            if(BluelinesTag::create(request(["tag_name"])))
               return back()->with("success", "Your tag has been saved");

            return back()->with('errors', "Failed to save tag");

        }

        public function update(Request $request) {

        }

        public function destroy($id) {

        }

    }
