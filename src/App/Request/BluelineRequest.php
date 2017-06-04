<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 6/2/2017
     * Time: 8:45 PM
     */

    namespace ShawnSandy\Bluelines\App\Request;


    use Illuminate\Foundation\Http\FormRequest;

    class BluelineRequest extends FormRequest
    {

        public function authorize()
        {
            return true;

        }

        public function rules()
        {

            return [
                "title" => "required|max:200",
                "slug" => "max:200",
                "body" => "required|min:50",
                "featured_image" => "image",
                "category" => "sometimes|required"
            ];

        }

    }
