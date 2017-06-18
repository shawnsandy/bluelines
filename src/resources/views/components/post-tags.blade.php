<ul class="list-group">
    <li class="list-group-item">
        <h4>Tags
            <button class="btn btn-sm btn-default tag-button">New Tag</button>
        </h4>
        <div class="bluform {{ count($errors) && request()->exists('tag_name') ? '' : "hide-element" }}">
            {{ Form::createForm('ShawnSandy\Bluelines\App\BluelinesTag', '/bluelines/tags') }}
        </div>
    </li>

@if(count($tags_list))
    <li class="list-group-item">
        @foreach($tags_list as $tag => $name)
            {{ $name }}
            <a href="/bluelines/tags/delete/{{ $tag }}" class="delete-btn"><i class="fa fa-times"></i></a>
        @endforeach
    </li>
@endif
</ul>
