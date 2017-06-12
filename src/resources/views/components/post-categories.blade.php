<ul class="list-group">
    <li class="list-group-item">
        <h3>Categories
            <button class="btn btn-sm btn-default tag-button">New Category</button>
        </h3>
        <div class="bluform {{ count($errors) && !request()->exists('tag_name') ? '' : "hide-element" }} ">
            {{ Form::open(['url' => '/bluelines/cats', 'name' => 'category' ]) }}
            {{ Form::dashFields('ShawnSandy\Bluelines\App\BluelinesCategory') }}
            <p class="form-group text-right">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </p>
            {{ Form::close() }}
        </div>
    </li>
    @if(count($categories))
        @foreach($categories as $category)
            <li class="list-group-item"> {{ $category->name }} </li>
        @endforeach
    @endif
</ul>
