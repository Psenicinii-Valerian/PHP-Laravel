@extends('layouts.layout')

@section('doc_title', "Dinosaur Info")

@section('doc_body')
    <div class="centered-info-dino">
        <div class="dinosaur">
            <h2>Species: {{ $dinosaur -> species }}</h2>
            <p>Type: {{ $dinosaur -> type }}</p>
            <p>Height: {{ $dinosaur -> height }}m</p>
            <p>Weight: {{ $dinosaur -> weight }}kg</p>
            <p>Color: {{ $dinosaur -> color }}</p>
            <img src="{{ $dinosaur -> img }}" alt="Dinosaur Image">
            <a href={{"/delete/" . $dinosaur -> id }}>Delete</a>
        </div>
    </div>
@endsection
