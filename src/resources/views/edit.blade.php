@extends('bluelines::layouts.layout')
@section('title', 'bluelines')
@section('page_title', 'Bluelines')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-9">

                {{ Form::model($post, ["url" => "/bluelines/posts/{$post->id }", "method" => "put", "files" => true]) }}

                @include("bluelines::partials.forms.post")

                <p class="form-group text-right">
                    <button class="btn btn-primary" type="submit">Update Post</button>
                    <button class="btn btn-default" type="reset">Clear</button>
                </p>

                {{ Form::close() }}

            </div>

            <div class="col-md-3">


                <aside class="panel panel-default post-preview">

                    <div class="panel-body">
                        <p class="small text-uppercase text-right text-muted">Post Preview</p>

                        @include("bluelines::partials.post-preview")
                        <hr>
                        <p class="small text-uppercase text-right text-muted">Post Preview</p>
                    </div>

                </aside>
            </div>
        </div>

    </div>


@endsection
{{ Html::ckeditor() }}
