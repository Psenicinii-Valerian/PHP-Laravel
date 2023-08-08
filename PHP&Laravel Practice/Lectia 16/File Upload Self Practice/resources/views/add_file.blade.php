@extends('layout')

@section('doc_body')
    <form action="/add_file" method="POST" enctype="multipart/form-data" class="form-upload-file">
        @csrf
        <label for="file" class="file-label">Choose file
            <input type="file" name="file" id="file">
        </label>
        
        @error('file')
            <h3>{{ $message }}</h3>
        @enderror
        <input type="text" name="author" placeholder="Enter the author of the file">
        @error('author')
            <h3>{{ $message }}</h3>
        @enderror
        <input type="text" name="description" placeholder="Enter the description of the file">
        @error('description')
            <h3>{{ $message }}</h3>
        @enderror
        <button type="submit">Upload file</button>
    </form>
@endsection