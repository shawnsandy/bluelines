<ul class="list-group">
    <li class="list-group-item">
        <div class="lead">Categories
            <button class="btn btn-sm btn-default tag-button">New Category</button>
        </div>
        <div class="bluform {{ count($errors) && !request()->exists('tag_name') ? '' : "hide-element" }} ">
            {{ Form::open(['url' => '/bluelines/cats', 'name' => 'category', "files" => true ]) }}
            {{ Form::dashFields('ShawnSandy\Bluelines\App\BluelinesCategory') }}
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default tag-button"><i class="fa fa-times"></i></button>
            </div>
            {{ Form::close() }}
        </div>
    </li>
    @if(count($categories))
        @foreach($categories as $category => $name)
            <li class="list-group-item"> {{ $name }} </li>
        @endforeach
    @endif
</ul>
