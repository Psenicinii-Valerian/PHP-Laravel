@extends("layouts.layout")

@section("doc_title", "Update")

@section("doc_body")
    <div class="main">
        {{-- putem lasa action="" - va fi aceeasi ca si ceea de mai jos(deoarece lucram pe acceasi pagina) --}}
        <form action="/update" method="POST">
            @csrf
            {{-- metoda definita printr-un element special Laravel, folosita pentru update-ul unei informatii --}}
            @method("PUT")
            <input type="text" name="item_name" value="{{ $item -> item_name }}">
            <input type="text" name="item_category" value="{{ $item -> item_category }}">
            <input type="number" name="item_price" value="{{ $item -> item_price }}" step="0.01">
            <input type="hidden" name="item_id" value="{{ $item -> item_id }}">
            <button id="update-btn">Update</button>
        </form>
    </div>
@endsection