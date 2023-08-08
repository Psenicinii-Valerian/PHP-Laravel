@extends("layouts.layout")

@section("doc_body")
    <div class="main">
        <h1>{{ $item -> item_name}}</h1>
        <p><strong>{{ $item -> item_category }}</strong></p>
        <p><em>{{ $item -> item_price }} MDL</em>
    </div>
@endsection