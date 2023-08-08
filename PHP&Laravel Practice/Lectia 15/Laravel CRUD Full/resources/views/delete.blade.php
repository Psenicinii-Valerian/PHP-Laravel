@extends("layouts.layout")

@section("doc_title", "Delete")

@section("doc_body")
    <div class="main">
        <h3>Are you sure you want to delete this item?</h3>
        <form action="/delete" method="POST">
            @csrf
            {{-- metoda definita printr-un element special Laravel, folosita pentru delete-ul unei informatii --}}
            @method("DELETE")
            <input type="hidden" name="item_id" value="{{ $id }}">
            <button>Delete</button>
        </form>
    </div>
@endsection