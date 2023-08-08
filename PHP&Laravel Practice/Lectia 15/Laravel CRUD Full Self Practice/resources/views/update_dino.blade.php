@extends('layouts.layout')

@section('doc_title', "Create")

@section('doc_body')
    <form action="/update" method="POST" class="update-form">
        @csrf
        @method("PUT")

        <input type="text" name="species" value="{{ $dinosaur -> species}}">
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

        <input type="number" name="height" value="{{ $dinosaur -> height}}" step="0.01" min="0.3">
        @error('height')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="number" name="weight" value="{{ $dinosaur -> weight}}" step="0.01" min="0.3">
        @error('weight')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="text" name="color" value="{{ $dinosaur -> color}}">
        @error('color')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="text" name="img" value="{{ $dinosaur -> img}}">
        @error('img')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="hidden" name="id" value="{{ $dinosaur -> id }}">

        <button type="submit">Update</button>
    </form>
@endsection
    