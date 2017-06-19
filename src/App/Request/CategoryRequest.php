<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 6/2/2017
     * Time: 8:43 PM
     */

    namespace ShawnSandy\Bluelines\App\Request;


    use Illuminate\Foundation\Http\FormRequest;

    class CategoryRequest extends FormRequest
    {

        public function authorize()
        {

            return true;

        }

        public function rules()
        {

            return [
                "name" => "required|min:5",
                "description" => "string|max:200",
                "image" => "image"
            ];

        }

    }
