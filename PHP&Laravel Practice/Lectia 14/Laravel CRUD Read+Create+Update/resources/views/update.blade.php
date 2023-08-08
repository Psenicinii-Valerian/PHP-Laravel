@extends("layouts.layout")

@section("doc_title", "Update")

@section("doc_body")
    <div class="main">
        {{-- putem lasa action="" - va fi aceeasi ca si ceea de mai jos(deoarece lucram pe acceasi pagina) --}}
        <form action="/update" method="POST">
            @csrf
            <label for="select_id" class="update-label">Select one element:</label>
            <select name="item_id" id="select_id">
                @foreach($items as $item)
                    <option value="{{ $item -> item_id }}">{{ $item -> item_name }}</option>
                @endforeach
            </select>
            <button id="select-btn">Select</button>
        </form>
    </div>
@endsection