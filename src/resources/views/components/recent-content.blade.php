@php
    $recent_posts = \ShawnSandy\Bluelines\App\Blueline::latest(5)->select("title", "id", "updated_at")->get();
@endphp
<ul class="list-group">
    <li class="list-group-item">
        <h4>Recent Post</h4>
    </li>
    @if(count($recent_posts))
        @foreach($recent_posts as $post_item)
            <li class="list-group-item">
                <a href="{{ $post_url or "/bluelines/posts/" }}{{ $post_item->id }}/edit">{{ $post_item->title }}</a>
                <div class="text-muted small">{{ $post_item->updated_at->diffForHumans() }}</div>
            </li>
        @endforeach
    @endif
</ul>
