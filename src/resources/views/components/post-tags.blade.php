<ul class="list-group">
    <li class="list-group-item">
        <h3>Tags
            <button class="btn btn-sm btn-default tag-button">New Tag</button>
        </h3>
        <div class="bluform {{ count($errors) && request()->exists('tag_name') ? '' : "hide-element" }}">
            {{ Form::createForm('ShawnSandy\Bluelines\App\BluelinesTag', '/bluelines/tags') }}
        </div>
    </li>

@if(count($tags))
    <li class="list-group-item">
        @foreach($tags as $tag)
            <a href="/" class="btn btn-link">{{ $tag->tag_name }}</a>
        @endforeach
    </li>
@endif
</ul>
