@extends('bluelines::layouts.layout')
@section('title', 'bluelines')
@section('page_title', 'Bluelines')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h3>Edit Post</h3>
                <hr>

                {{ Form::model($post, ["url" => "/bluelines/posts/{$post->id }", "method" => "put"]) }}

                @include("bluelines::partials.forms.post")

                <p class="form-group text-right">
                    <button class="btn btn-primary btn-lg" type="submit">Save Post</button>
                    <button class="btn btn-default btn-lg" type="reset">Clear</button>
                </p>

                {{ Form::close() }}

            </div>

            <div class="col-md-4">
                <h3>Content Options</h3>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio nesciunt numquam sapiente
                            voluptatem? Adipisci, commodi consectetur delectus deserunt dolore eos error esse illo illum iure
                            ullam vel, voluptatem voluptatum.</p>
                    </div>
                </div>
            </div>


        </div>
    </div>


@endsection

@push("scripts")
<script src="//cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('body');
</script>
@endpush
