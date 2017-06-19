<p>
    <img src="{{ Html::postImg($post->featured_image, "?w=380") }}" alt="" class="img-responsive">
</p>

<h1>
    {{ $post->title }}
</h1>

<div class="meta">
    Posted : {{ $post->created_at->diffForHumans() }}
</div>
<hr>
<p>
    {!! $post->excerpt !!}
</p>
