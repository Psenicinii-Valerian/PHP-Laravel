@extends('layouts.layout')

@section('doc_title', "Create")

@section('doc_body')
    <form action="/create" method="POST" class="create-form">
        @csrf
        <input type="text" name="species" placeholder="Species">
        @error('species')
            <p class="error">{{ $message }}</p>
        @enderror

        <div class="type">
            <label for="type">Type:</label>
            <select name="type" id="type">
                <option value="Herbivore">Herbivore</option>
                <option value="Carnivore">Carnivore</option>
            </select>
            @error('type')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <input type="number" name="height" placeholder="Height(m)" step="0.01" min="0.3">
        @error('height')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="number" name="weight" placeholder="Weight(kg)" step="0.01" min="0.3">
        @error('weight')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="text" name="color" placeholder="Color">
        @error('color')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="text" name="img" placeholder="Image(link)">
        @error('img')
            <p class="error">{{ $message }}</p>
        @enderror
        <button type="submit">Create</button>
    </form>
@endsection
    