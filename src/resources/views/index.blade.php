@extends('bluelines::layouts.layout')
@section('title', 'bluelines')
@section('page_title', 'Bluelines')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="h1">Content Lines</div>
            </div>

            <div class="col-md-8">

                <ul class="bluelines-content list-group">

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-10"><p>Title / description goes here </p></div>
                            <div class="col-md-2 text-right">
                                    <a href="#" class="btn btn-default">View / Edit</a>

                            </div>
                        </div>
                    </li>

                </ul>
            </div>
            <div class="col-md-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio nesciunt numquam sapiente
                    voluptatem? Adipisci, commodi consectetur delectus deserunt dolore eos error esse illo illum iure
                    ullam vel, voluptatem voluptatum.</p>
            </div>
        </div>
    </div>

@endsection
