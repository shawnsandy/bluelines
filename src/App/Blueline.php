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
            "title", "slug", "status", "body", "featured", "excerpt", "featured_image", "author_id"
        ];

        public function categories()
        {
            return $this->belongsToMany(BluelinesCategory::class);
        }

        public function tags()
        {
            return $this->belongsToMany(BluelinesTag::class);
        }

        public function files()
        {
            return $this->belongsToMany(BluelinesFile::class);
        }

        public function meta()
        {
            return $this->hasMany(BluelinesMeta::class);
        }

        /**
         * @param $query
         * @return mixed
         */
        public function scopeLatest($query)
        {
            return $query->orderBy("id", "DESC");
        }

        /**
         * @param     $query
         * @param int $paginate
         * @return mixed
         */
        public function scopeLatestPaginated($query, $paginate = 20)
        {
            return $query->orderBy("id", "DESC")->paginate($paginate);
        }

        /**
         * @param $query
         * @param $post_id
         * @return mixed
         */
        public function scopeSingle($query, $post_id)
        {
            return $query->where("id", $post_id)->with("categories", "tags")->first();
        }


    }
