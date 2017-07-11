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
        public function scopeLatest($query, $limit = 20)
        {
            return $query->orderBy("id", "DESC")->take($limit);
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

        public function getWasCreatedAttribute($query)
        {
            return $this->created_at->diffForHumans();
        }

        public function getWasUpdatedAttribute($query)
        {
            return $this->updated_at->diffForHumans();
        }


        public function getTheExcerptAttribute($value)
        {
            if(!empty($value)):
                return $value;
            else :
                return strip_tags(str_limit($this->body, 255));
            endif;
        }

    }
