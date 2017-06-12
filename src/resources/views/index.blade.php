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

                        @foreach($content as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td class="text-right">
                                    <a href="/bluelines/posts/{{ $post->id }}/edit" class="btn btn-primary btn-sm">View / Edit</a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                @endif

            </div>

            <div class="col-md-4">

                <div class="widget-forms">
                    {{ Html::blueCategories($categories) }}
                </div>

                <div class="widget-forms">
                   {{ Html::blueTags($tags) }}
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

    $("form").each(function () {
        var forms = $(this);
        console.log(forms.length);
        $(forms).find("input,textarea,select").filter("[required]").each(function () {
            var rfields = $(this);
            console.log('tfileds' + rfields.length);
        });
        $(forms).submit(function(e){

            $("input,textarea,select").filter('[required]').each(function () {
                if($(this.val() === "")) {
                    e.preventDefault()
                    $(this).addClass("validate-error").val('*') ;
                }

            });
        })
    });

</script>

@endpush
