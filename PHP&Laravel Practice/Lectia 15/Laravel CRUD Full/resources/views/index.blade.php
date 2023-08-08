@extends("layouts.layout")

@section("doc_title", "Home")

@php
    $color = "red";
    $darkText = true;
@endphp

@section("doc_body")
    <script defer src={{ asset("/js/index.js") }}></script>
    {{-- <h1 @style([ "background-color: $color", "color: " . $darkText ? "black" : "white" ])>Home</h1> --}}

    @if (session("success"))
        <p id="success">{{ session("success") }}</p>
    @endif      

    <div class="items">
        @foreach ($items as $item)
            <a href={{ "/item/" . $item -> item_id }} class="item">
                <h1>{{ $item -> item_name}}</h1>
                <p><strong>{{ $item -> item_category }}</strong></p>
                <p><em>{{ $item -> item_price }} MDL</em></p>
            </a>
        @endforeach
    </div>

    {{-- <p style="margin-top: 20px;">Item: {{ $itm -> item_name }}</p> --}}
@endsection