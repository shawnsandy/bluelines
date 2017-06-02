<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 5/30/2017
     * Time: 11:24 PM
     */

    namespace ShawnSandy\Bluelines\App;


    use Illuminate\Database\Eloquent\Model;

    class Blueline extends Model
    {
        protected $fillable = [
            "title", "slug", "status", "bluelines_content_type_id", "body",  "featured", "featured_image", "excerpt",
            ];

    }
