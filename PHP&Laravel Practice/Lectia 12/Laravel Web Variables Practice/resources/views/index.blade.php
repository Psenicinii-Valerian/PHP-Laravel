@extends("layouts.layout")

@section("doc_title", "Home")

@php
    $color = "red";
    $darkText = true;
@endphp

@section('doc_body')
    <h1 @style(['background-color: ' . $color, 'color: ' . $darkText ? 'black' : 'white'])>Home</h1>
    <p style="margin-top: 20px;"> {{ $loc }}</p>
    <p> {{ $name }}</p>
    <ol>
        @foreach ($friends as $bro)
            <li> {{ $bro['name'] . ', ' . $bro['email'] }}</li>
        @endforeach
    </ol>
@endsection
    