@php
    $recent_posts = Blue::recentPostsUpdates(7);
@endphp
<ul class="list-group">
    @if(count($recent_posts))
        @foreach($recent_posts as $post_item)
            <li class="list-group-item">
                <a href="{{ $post_url or "/bluelines/posts/" }}{{ $post_item->id }}/edit">{{ $post_item->title }}</a>
                <div class="text-muted small">{{ $post_item->updated_at->diffForHumans() }}</div>
            </li>
        @endforeach
    @endif
</ul>
