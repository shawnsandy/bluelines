@extends('bluelines::layouts.layout')
@section('title', 'bluelines')
@section('page_title', 'Bluelines')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                {{ Form::model($post, ["url" => "/bluelines/posts/{$post->id }", "method" => "put", "files" => true]) }}

                @include("bluelines::partials.forms.post")

                <p class="form-group text-right">
                    <button class="btn btn-primary" type="submit">Update Post</button>
                    <button class="btn btn-default" type="reset">Clear</button>
                </p>

                {{ Form::close() }}

            </div>

            <div class="col-md-6">


                <aside class="post-preview">

                    <p>
                        <img src="{{ Html::postImg($post->featured_image, "?w=820") }}" alt="" class="img-responsive">
                    </p>

                    <h2>
                        {{ $post->title }}
                    </h2>

                    <div class="meta">
                        Posted : {{ $post->created_at->diffForHumans() }}
                    </div>
                    <hr>
                    <p>
                        {!! $post->excerpt !!}
                    </p>
                    <hr>
                    <p class="small text-uppercase text-right text-muted">Post Preview</p>


                </aside>
            </div>


        </div>
    </div>


@endsection
{{ Html::ckeditor() }}
