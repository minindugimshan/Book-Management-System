@extends('layout')

@section('content')
    <h1>Image Details</h1>
    <p><strong>ID:</strong> {{ $image->id }}</p>
    <p><strong>Book:</strong> {{ $image->book->title ?? '-' }}</p>
    <p><strong>Image:</strong><br>
        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Book Image" width="120">
    </p>
    <a href="{{ route('images.edit', $image) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('images.index') }}" class="btn btn-secondary">Back</a>
@endsection 