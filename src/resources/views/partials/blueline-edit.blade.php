{{ Form::model($post, ["url" => "/bluelines/posts/{$post->id }", "method" => "put", "files" => true]) }}

@include("bluelines::partials.forms.post")

{{ Form::close() }}

{{ Html::ckeditor() }}
