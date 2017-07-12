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

<script src="/assets/bluelines/js/blue.js"></script>

@endpush
