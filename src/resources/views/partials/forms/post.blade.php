@php
    $fields = DashForms::buildModelFields('ShawnSandy\Bluelines\App\Blueline') ;
    // category and tags select config options
    config(["forms.category.options.categories[]" => $categories_list]);
    config(["forms.tags.options.tags[]" => $tags_list]);
@endphp

<div class="row">

    <div class="col-md-12">
        {{ $fields['title'] }}
    </div>

    <div class="clearfix">
        <div class="col-md-3">
            {{ $fields["status"] }}
        </div>
        <div class="col-md-2">
            {{ $fields["featured"] }}
        </div>

        <div class="col-md-7">
            {{ Form::dashSelect("tags[]", 'Tags',  ["data-table" => "tags", "multiple" => "multiple"]) }}
        </div>
    </div>

    <div class="col-md-12">
        {{ Form::dashSelect("categories[]", 'Category',  ["data-table" => "category", "multiple" => "multiple" ]) }}
    </div>
    <div class="col-md-6"></div>
    <div class="col-md-12">
        {{ $fields["body"] }}
    </div>
    <div class="col-md-12">
        {{ $fields["featured_image"] }}
    </div>
    <div class="col-md-12">
        {{ $fields["excerpt"] }}
    </div>

</div>

@push("styles")
<style>
    .file-input-box {
        background-color: darkgrey;
        color: #FFF;
        padding: 10px;
    }
</style>
@endpush


{{ Html::select2Js() }}
@push("scripts")
<script>
    $(".category").select2({
        maximumSelectionLength: 5
    });
    $(".tags").select2({
        maximumSelectionLength: 8,
        tags: true
    });
</script>
@endpush
