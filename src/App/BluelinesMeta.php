<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 5/30/2017
     * Time: 11:29 PM
     */

    namespace ShawnSandy\Bluelines\App;


    use Illuminate\Database\Eloquent\Model;

    class BluelinesMeta extends Model
    {

        protected $table = "bluelines_meta";

        public function content() {
            return $this->belongsTo(Blueline::class);
        }

    }
