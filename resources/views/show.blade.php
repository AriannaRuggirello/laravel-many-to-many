@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <h1> &#128193;{{ $projects->title }}</h1>
        <p>
            {{ $projects->description }}
        </p>
        <div class="row text-center my-3">
            <span class="col-lg-3 bg-primary text-light rounded mx-3">
                Publish date: {{ $projects->publish_date }}
            </span>
            <span class="col-lg-3  bg-primary text-light rounded mx-3">
                Type: {{ $projects->type->name }}
            </span>
        </div>

    </div>
@endsection
