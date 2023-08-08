@extends('layout')

@section('doc_body')
<div class="files">
    @foreach ($files as $file)
    <div class="file">
        @php
            $filename = $file->name;
            $filenameWithoutExtension = pathinfo($filename, PATHINFO_FILENAME);
            $parts = explode('_', $filenameWithoutExtension);
            $extractedName = end($parts);
        @endphp
        <h2>{{ $extractedName }}</h2>
        <p>Author: {{ $file -> author }}</p>
        <p>Description: {{ $file -> description }}</p>
        <img src="{{ asset('storage/' . $file->path) }}" alt="Image Graphical Representation">
    </div>
    @endforeach
    {{ $files -> links() }} 
</div>

@endsection