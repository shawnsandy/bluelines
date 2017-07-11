@extends('bluelines::layouts.layout')
@section('title', 'bluelines')
@section('page_title', 'Bluelines')

@section("content")

    <div class="container">
        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                <div class="row">

                    <div class="col-md-12">
                        @foreach($posts as $post)
                            <article>

                                <p class="h1">
                                    <a href="/bluelines/blog/{{ $post->id }}" class="">{{ $post->title }}</a>
                                </p>
                                <hr>
                                <p class="small">{{ $post->was_created }}</p>

                                @if($post->featured_image)

                                    <p>
                                        <img src="{{ Html::postImg($post->featured_image, "?w=960&h=480&fit=crop-center") }}"
                                             alt="" class="img-responsive">
                                    </p>

                                @endif


                                <p>
                                    {{ $post->the_excerpt }}
                                </p>
                                <p class="text-left">
                                    <a href="/bluelines/blog/{{ $post->id }}" class="text-right btn btn-primary">
                                        Read More
                                    </a>
                                </p>
                            </article>
                            <hr>
                        @endforeach
                    </div>

                </div>
                {{ $posts->links() }}
                <hr>
            </div>

        </div>

    </div>
    {{ dump($posts) }}
@endsection
