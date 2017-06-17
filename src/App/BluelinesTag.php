<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 5/30/2017
     * Time: 11:33 PM
     */

    namespace ShawnSandy\Bluelines\App;


    use Illuminate\Database\Eloquent\Model;

    class BluelinesTag extends Model
    {
        protected $fillable = ['tag_name'];

        public function content()
        {
            return $this->belongsToMany(Blueline::class);
        }

        public function scopeWithContent($query, $category_id)
        {
            return $query->with("content")->where("id", $category_id);
        }

    }
