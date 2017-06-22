<p>
    <img src="{{ Html::postImg($post->featured_image, "?w=380") }}" alt="" class="img-responsive">
</p>

<h1>
    {{ $post->title }}
</h1>

<div class="meta">
    Posted : {{ $post->was_created }} Updated : {{ $post->was_updated }}
</div>
<hr>
<p>
    {!! $post->the_excerpt !!}
</p>
