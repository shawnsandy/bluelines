
{{ Form::open(["url" => "/bluelines/posts", "files" => true]) }}

@include("bluelines::partials.forms.post")

{{ Form::close() }}

{{ Html::ckeditor() }}
