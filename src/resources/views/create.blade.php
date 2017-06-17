@extends('bluelines::layouts.layout')
@section('title', 'bluelines')
@section('page_title', 'Bluelines')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-9">
                <aside class="panel panel-default">
                    <div class="panel-body">
                        <h3>Create a new post</h3>
                        <hr>
                        @include("bluelines::partials.blueline-create")
                    </div>
                </aside>
            </div>

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Edit Post</h3>
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
