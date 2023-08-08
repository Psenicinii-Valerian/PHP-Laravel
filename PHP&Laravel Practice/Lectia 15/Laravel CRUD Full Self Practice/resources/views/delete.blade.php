@extends('layouts.layout')

@section('doc_title', "Delete")

@section('doc_body')
<div class="delete-dino">
    <h2>Are you sure you want to delete this item?</h2>
    <form action="/delete" method="POST" class="form-delete-dino">
        @csrf
        @method("DELETE")
        <img src={{ $dinosaur -> img }} alt="Dinosaur Image">
        <input type="hidden" name="id" value="{{ $id }}">
        <button type="submit">Delete</button>
    </form>
</div>
@endsection
