@extends('layouts.layout')

@section('doc_title', "Update")

@section('doc_body')
    <div class="centered-info">
        <form action="/update" method="POST" class="dino-form">
            @csrf
            <label for="select_dinosaur_id" class="update-label">Select one dinosaur to update:</label>
            <select name="id">
                @foreach($dinosaurs as $dinosaur) 
                    <option value="{{ $dinosaur -> id }}">{{ $dinosaur -> species }}</option>
                @endforeach
            </select>
            <button type="submit">Select</button>
        </form>
    </div>
@endsection
