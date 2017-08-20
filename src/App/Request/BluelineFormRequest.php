<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 6/2/2017
     * Time: 8:45 PM
     */

    namespace ShawnSandy\Bluelines\App\Request;


    use Auth;
    use Illuminate\Foundation\Http\FormRequest;
    use ShawnSandy\Bluelines\App\Blueline;

    class BluelineFormRequest extends FormRequest
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

        /**
         * Sync /  attach all related fields to pivot tables
         *
         * @param $post post object
         */
        public function syncRelated($post)
        {

            if ($this->has("categories"))
                $post->categories()->sync(request()->input("categories"));

            if ($this->has("tags"))
                $post->tags()->sync(request()->input("tags"));

        }

        public function createOrUpdateSlug($post)
        {

            if (!$this->has("slug")):
                $slug = str_slug($post->title . "-" . $post->created_at->toDateTimeString());
                Blueline::updateOrCreate(["id" => $post->id], ["slug" => $slug]);
            endif;
        }

        public function upload()
        {

            if ($this->hasFile("featured_image") && $this->file("featured_image")->isValid()) :
                return $this->file('featured_image')->store('img');
            else :
                return null;
            endif;
        }

        public function update($id, $post_type)
        {

            $data = $this->input();
            $data['author_id'] = Auth::id() ? Auth::id() : 1;
            $data["type"] = $post_type ;

            if ($feature_image = $this->upload())
                $data['featured_image'] = $feature_image;

            if ($post = Blueline::updateOrCreate(["id" => $id], $data)):
                $this->syncRelated($post);
                return $post;
            endif;

            return false;

        }

        public function save($post_type)
        {
            $data = $this->input();
            $data['author_id'] = Auth::id() ? Auth::id() : 1;
            $data["post_type"] = $post_type;
            if ($feature_image = $this->upload())
                $data["featured_image"] = $feature_image;

            if ($post = Blueline::create($data)):
                $this->syncRelated($post);
                return $post;
            endif;
            return false;
        }

    }
