<ul class="list-group">
    <li class="list-group-item">
        <h4 class="">Categories
            <button class="btn btn-sm btn-default tag-button">New Category</button>
        </h4>
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
