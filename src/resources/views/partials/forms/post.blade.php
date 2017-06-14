@php $fields = DashForms::buildModelFields('ShawnSandy\Bluelines\App\Blueline') @endphp

<div class="row">

    <div class="col-md-12">
        {{ $fields['title'] }}
    </div>
    <div class="col-md-8">
        {{ $fields["slug"] }}
    </div>
    <div class="col-md-2">
        {{ $fields["status"] }}
    </div>
    <div class="col-md-2">
        {{ $fields["featured"] }}
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



