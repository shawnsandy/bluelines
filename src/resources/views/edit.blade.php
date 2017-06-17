@extends('bluelines::layouts.layout')
@section('title', 'bluelines')
@section('page_title', 'Bluelines')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-9">

                <aside class="panel panel-default">
                    <div class="panel-body">
                        <h3>Edit Post</h3>
                        <hr>
                        @include("bluelines::partials.blueline-edit")
                    </div>
                </aside>

            </div>

            <div class="col-md-3">

               <aside class="panel panel-default">
                   <div class="panel-body">
                       <p class="small text-uppercase text-muted">Post Preview</p>

                       @include("bluelines::partials.post-preview")
                       <hr>
                       <p class="small text-uppercase text-muted">Post Preview</p>
                   </div>
               </aside>

            </div>

        </div>

    </div>


@endsection

