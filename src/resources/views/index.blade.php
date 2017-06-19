@extends('bluelines::layouts.layout')
@section('title', 'bluelines')
@section('page_title', 'Bluelines')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-9">
                @include("bluelines::partials.blueline-index")
            </div>

            <div class="col-md-3">

                <div class="widget-forms">
                    @include("bluelines::components.post-categories")
                </div>

                <div class="widget-forms">
                    @include("bluelines::components.post-tags")
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
    td {
        font-size: 14px;
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
        $(forms).submit(function (e) {

            $("input,textarea,select").filter('[required]').each(function () {
                if ($(this.val() === "")) {
                    e.preventDefault();
                    $(this).addClass("validate-error").val('*');
                }

            });
        })
    });

    $(".delete-btn").each(function () {
        var el = $(this);

        $(el).click(function (e) {
            var elValue = el.html();
            if (elValue === "<i class=\"fa fa-times\"></i>") {
                e.preventDefault();
                el.html("<i class=\"fa fa-check\"></i>");
                setTimeout(function () {
                    el.html("<i class=\"fa fa-times\"></i>");
                }, 4000);
            }
        });

    });

</script>

@endpush
