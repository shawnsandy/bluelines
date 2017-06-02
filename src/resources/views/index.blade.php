@extends('bluelines::layouts.layout')
@section('title', 'bluelines')
@section('page_title', 'Bluelines')

@section('content')
    <div class="container-fluid">

        <hr>
        <div class="row">
            <div class="col-md-8">

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

            <div class="col-md-4">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Content Categories</h3>
                        {{ Form::createForm('ShawnSandy\Bluelines\App\BluelinesCategory') }}
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Content Tags</h3>
                        {{ Form::createForm('ShawnSandy\Bluelines\App\BluelinesTag') }}
                    </div>
                </div>

            </div>

        </div>
    </div>


@endsection
