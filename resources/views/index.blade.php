@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="text-center">
            @auth

                {{ Auth::user()->name }}

                <a class="btn btn-primary" href="{{ route('project.create') }}">
                    +
                </a>
            @endauth

        </div>
        <div class="row row-cols-4 p-5 ">

            @foreach ($projects as $project)
                <div class="col">
                    <a class='link-offset-2 link-underline link-underline-opacity-0'
                        href="{{ route('project.show', $project->id) }}">
                        &#128193;
                        {{ $project->title }}
                        {{ $project->publish_date }}

                    </a> -
                </div>
            @endforeach


        </div>

    </div>
@endsection
