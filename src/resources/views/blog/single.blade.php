@extends('bluelines::layouts.layout')
@section('title', 'bluelines')
@section('page_title', 'Bluelines')

@section("content")

    <div class="container">
       <div class="container">
           <div class="col-md-12">
               <article>
                   <p>

                       <img src="{{ Html::postImg($blog->featured_image, "?w=1200&h=600&fit=crop-center") }}"

                   </p>

                   <p class="h1">
                       {{ $blog->title }}
                   </p>
                   <p class="">Created : {{ $blog->was_created }}</p>
                   <hr>
                   <p class="content">
                       {!! $blog->body !!}
                   </p>
               </article>
           </div>
       </div>
    </div>

@endsection
