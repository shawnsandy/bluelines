@extends('bluelines::layouts.layout')
@section('title', 'bluelines')
@section('page_title', 'Bluelines')

@section('content')
    <div class="container-fluid">

        <hr>
        <div class="row">
            <div class="col-md-8">

                @if(count($content) < 0)
                    <p class="alert alert-info text-center">Not content found</p>
                @else
                    <table class="table">

                        <thead>
                        <tr>
                            <th class="col-md-1">id</th>
                            <th>Name</th>
                            <th class="col-md-2">Created</th>
                            <th class="col-md-1 text-right">Action</th>

                        </tr>
                        </thead>

                        <tr>
                            <td>5</td>
                            <td>Name</td>
                            <td>Created</td>
                            <td class="text-right">
                                <div class="btn btn-primary btn-sm">View / Edit</div>
                            </td>
                        </tr>

                    </table>
                @endif

            </div>

            <div class="col-md-4">

                <div class="widget-forms panel panel-default">
                    <div class="panel-body">
                        <h3>Content Categories
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

                    </div>
                </div>

                <div class="widget-forms panel panel-default">
                    <div class="panel-body">
                        <h3>Content Tags
                            <button class="btn btn-sm btn-default tag-button">New Tag</button>
                        </h3>
                        <div class="bluform {{ count($errors) && request()->exists('tag_name') ? '' : "hide-element" }}">
                            {{ Form::createForm('ShawnSandy\Bluelines\App\BluelinesTag', '/bluelines/tags') }}
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>


@endsection

@push('styles')
<style>
    .hide-element {
        display: none;
    }
    .validate-error {
        border-color: red;
        color: red;
    }
</style>

@endpush

@push('scripts')

<script>

    $(".widget-forms").each(function () {

        var el = $(this);
        console.log(el);
        var button = $(el).find('.tag-button');
        var frm = $(el).find('.bluform');

        $(button).on('click', function () {
            console.log($(button).text());
            $(frm).fadeToggle();
        });

    });

    $("form").each(function() {
       var forms = $(this);
       console.log(forms.length);
       $(forms).find("input,textarea,select").filter("[required]").each(function(){
          var rfields = $(this);
          console.log('tfileds' + rfields.length);
       });
    });
    $("input,textarea,select").filter('[required]').each(function(){
        $(this).addClass("validate-error").val('*');
    });

</script>

@endpush
