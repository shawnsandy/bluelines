@extends('bluelines::layouts.layout')
@section('title', 'bluelines')
@section('page_title', 'Bluelines')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="h1">Content Admin</div>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                @if(count($content) < 1)
                    <p class="alert alert-info text-center">Not content found</p>
                @else
                    <table class="table">

                        <thead>
                        <tr>
                            <th class="col-md-1">id</th>
                            <th>Name</th>
                            <th class="col-md-2">Created</th>
                            <th class="col-md-1 text-right">Action</th>

                        </tr>
                        </thead>

                        <tr>
                            <td>5</td>
                            <td>Name</td>
                            <td>Created</td>
                            <td class="text-right">
                                <div class="btn btn-primary btn-sm">View / Edit</div>
                            </td>
                        </tr>

                    </table>
                @endif

            </div>

            <div class="col-md-3">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio nesciunt numquam sapiente
                    voluptatem? Adipisci, commodi consectetur delectus deserunt dolore eos error esse illo illum iure
                    ullam vel, voluptatem voluptatum.</p>
            </div>
        </div>
    </div>


@endsection
