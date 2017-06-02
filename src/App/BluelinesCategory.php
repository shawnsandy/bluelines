<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 5/30/2017
     * Time: 11:26 PM
     */

    namespace ShawnSandy\Bluelines\App;


    use Illuminate\Database\Eloquent\Model;

    class BluelinesCategory extends Model
    {

        protected $fillable = ["name", "description", "bluelines_file"];

    }
