@extends('bluelines::layouts.layout')
@section('title', 'bluelines')
@section('page_title', 'Bluelines')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h3>Create a New Post</h3>
                <hr>

                {{ Form::open(["url" => "/bluelines"]) }}

                @include("bluelines::partials.forms.post")

                <p class="form-group text-right">
                    <button class="btn btn-primary btn-lg" type="submit">Save Content</button>
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
