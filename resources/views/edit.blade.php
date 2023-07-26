@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row my-5">
            <h1>NEW ROLE</h1>
            <form method="POST" action="{{ route('project.update', $project->id) }}">

                @csrf
                @method('PUT')

                <label for="title">NAME</label>
                <br>
                <input type="text" name="title" id="title" value='{{ $project->title }}'>
                <br>
                <label for="description">DESCRIPTION</label>
                <br>
                <input type="text" name="description" id="description" value='{{ $project->description }}'>
                <br>
                <label for="publish_date">PUBLISH DATE</label>
                <br>
                <input type="date" name="publish_date" id="publish_date" value='{{ $project->publish_date }}'>
        </div>

        <label for="type_id">TYPE</label>
        <br>

        <select name="type_id" required>
            <!-- Itera attraverso tutti i tipi disponibili -->
            @foreach ($types as $type)
                <!-- Ogni opzione ha un valore corrispondente all'ID del tipo -->
                <option value="{{ $type->id }}" @if ($type->id == $project->type_id) selected @endif>
                    <!-- Il testo all'interno dell'opzione è il nome del tipo -->
                    {{ $type->name }}
                </option>
            @endforeach
        </select>


        <br>
        <label>TECHNOLOGIES:</label>
        <br>
        <!-- Itera attraverso tutte le tecnologie disponibili -->
        @foreach ($technologies as $technology)
            <!-- Ogni checkbox ha un nome (tecnologies[]) che indica un array delle tecnologie selezionate -->
            <input type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                @if (in_array($technology->id, $project->technologies->pluck('id')->toArray())) checked @endif>
            <!-- Il testo accanto alla checkbox è il nome della tecnologia -->
            {{ $technology->name }}
        @endforeach

        <br>
        <input class="my-3 btn btn-primary " type="submit" value="UPDATE">




    </div>


    </form>
    </div>
@endsection
