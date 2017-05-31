@extends('bluelines::layouts.layout')
@section('title', 'bluelines')
@section('content')
    <div class="container">
        <h1>Hello world...</h1>
        @foreach(DashForms::buildModelFields('App\User') as $field)
            {{ $field }}
        @endforeach
    </div>

@endsection
