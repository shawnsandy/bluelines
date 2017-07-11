# Blueline Forms

### Create new post

```blade

{{ Form::open(["url" => "/bluelines/posts", "files" => true]) }}

@include("bluelines::partials.forms.post")

{{ Form::close() }}

{{ Html::ckeditor() }}

```

### Edit post blade

```blade
{{ Form::model($post, ["url" => "/bluelines/posts/{$post->id }", "method" => "put", "files" => true]) }}

@include("bluelines::partials.forms.post")

{{ Form::close() }}

{{ Html::ckeditor() }}

```


