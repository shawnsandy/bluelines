<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 5/30/2017
     * Time: 11:24 PM
     */

    namespace ShawnSandy\Bluelines\App;


    use Illuminate\Database\Eloquent\Model;
    use ShawnSandy\Extras\Traits\ModelExtras;
    use App\User;


    class Blueline extends Model
    {

        use ModelExtras;

        protected $fillable = [
            "title", "slug", "status", "body", "featured", "excerpt", "featured_image"
        ];

//        protected $with = ["categories", "tags"];

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

        public function user() {
            return $this->belongsTo(User::class);
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
            if(!empty($this->excerpt)):
                return $this->excerpt;
            else :
                return strip_tags(str_limit($this->body, 255));
            endif;
        }

        public function getPostThumbnailAttribute($value)
        {

            if(empty($this->featured_image))
                return null;

            return "/extras/glide/".$this->featured_image ;

        }

    }
