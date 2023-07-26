@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <h1> &#128193;{{ $project->title }}</h1>
        <p>
            {{ $project->description }}
        </p>
        <div class="row text-center my-3">
            <span class="col-lg-3 bg-success text-light rounded mx-3">
                Publish date: {{ $project->publish_date }}
            </span>
            <span class="col-lg-3  bg-success text-light rounded mx-3">
                Type: {{ $project->type->name }}
            </span>

            <div class="row">
                Technology:
                @foreach ($project->technologies as $technology)
                    <span>{{ $technology->name }}</span>
                @endforeach
            </div>


        </div>
        <a class="btn btn-primary" href="{{ route('project.edit', $project->id) }}">
            EDIT
        </a>
    </div>
@endsection
