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

            <span class="col-lg-3  bg-success text-light rounded mx-3">
                technology:
                @foreach ($projects->technologies as $technology)
                    <span>{{ $technology->name }}</span>
                @endforeach
            </span>
        </div>
        <a class="btn btn-primary" href="{{ route('project.edit', $technology->id) }}">
            EDIT
        </a>
    </div>
@endsection
