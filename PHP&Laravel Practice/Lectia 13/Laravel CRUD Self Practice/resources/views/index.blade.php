@extends('layouts.layout')

@section('doc_title', "Home")

@section('doc_body')
    <script src="{{ asset('/js/app.js')}}" defer></script>

    @if(session("success_msg"))
        <p id="success">{{ session("success_msg") }}</p>
    @endif

    <div class="dinosaurs">
        @foreach ($dinosaurs as $dinosaur)
            <div class="dinosaur">
                <h1>Species: {{ $dinosaur -> species }}</h1>
                <p>Type: {{ $dinosaur -> type }}</p>
                <p>Height: {{ $dinosaur -> height }}m</p>
                <p>Weight: {{ $dinosaur -> weight }}kg</p>
                <p>Color: {{ $dinosaur -> color }}</p>
                <img src="{{ $dinosaur -> img }}" alt="Dinosaur Image">
            </div>
        @endforeach
    </div>
@endsection