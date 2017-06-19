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

        protected $fillable = ["name", "description", "image"];

        public function content()
        {
            return $this->belongsToMany(Blueline::class);
        }

        /**
         * @param        $query
         * @param        $category_id
         * @return mixed
         */
        public function scopeWithContent($query, $category_id)
        {
            return $query->with('content')->where('id', $category_id);
        }

        public function scopeList($query)
        {
            return $query->orderBy("name", "DESC")->pluck("name", "id");
        }

    }
