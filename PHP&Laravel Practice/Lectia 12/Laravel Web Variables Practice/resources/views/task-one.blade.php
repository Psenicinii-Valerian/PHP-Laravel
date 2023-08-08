@extends("layouts.layout")

@section("doc_title", "Task One")

@section("doc_body")
    <h1>The fact that the {{ $text }} is {{ $number }} is {{ $booleanVal ? "True" : "False" }}</h1>

    @foreach($chineseDynasties as $chineseDynasty)
        <p style="margin-top: 10px;">Dynasty name: {{ $chineseDynasty["dynasty"] }}, Period: {{ $chineseDynasty["period"]}} </p>
    @endforeach

    @foreach($chineseCars as $idx => $chineseCar)
        <p style="margin-top: 10px">{{ $idx+1 }}. {{ $chineseCar }}</p>
    @endforeach

@endsection