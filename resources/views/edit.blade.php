@extends('layouts.main-layout')

@section('content')
    <div class="text-center">
        <h1>NEW ROLE</h1>
        <form method="POST" action="{{ route('projet.update', $technology->id) }}">

            @csrf
            @method('PUT')

            <label for="name">Name</label>
            <br>
            <input type="text" name="name" id="name" value="{{ $technology->name }}">
            <br>
            <h4 class="mt-3">types</h4>
            @foreach ($types as $type)
                <div class="form-check mx-auto" style="width: 200px">
                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="users[]"
                        value="{{ $type->id }}"
                        @foreach ($technology->types as $projectTechnology)
                        @if ($projectTechnology->id === $type->id)
                            checked
                        @endif @endforeach>
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $type->name }}
                    </label>
                </div>
            @endforeach

            <br>
            <input class="my-3" type="submit" value="UPDATE">
        </form>
    </div>
@endsection
