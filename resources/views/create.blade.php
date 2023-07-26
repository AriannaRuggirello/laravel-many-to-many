@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Create new Project</h1>

        <form method="POST" action="{{ route('project.store') }}">

            @csrf
            @method('POST')

            <label for="title">NAME</label>
            <br>
            <input type="text" name="title" id="title">
            <br>
            <label for="description">DESCRIPTION</label>
            <br>
            <input type="text" name="description" id="description">
            <br>
            <label for="publish_date">PUBLISH DATE</label>
            <br>
            <input type="date" name="publish_date" id="publish_date">
            <br>
            <label for="type_id">Type</label>
            <br>
            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">
                        {{ $type->name }}
                        {{ $type->type_id }}
                    </option>
                @endforeach
            </select>
            <br>
            @foreach ($technologies as $technology)
                <input type="checkbox" name="technologies[]" value="{{ $technology->id }}"> {{ $technology->name }}
            @endforeach
            <input class="my-3" type="submit" value="CREATE">

        </form>
    </div>
@endsection
