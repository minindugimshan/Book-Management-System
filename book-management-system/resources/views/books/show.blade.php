@extends('layout')

@section('content')
    <h1>Book Details</h1>
    <p><strong>ID:</strong> {{ $book->id }}</p>
    <p><strong>Title:</strong> {{ $book->title }}</p>
    <p><strong>Author:</strong> {{ $book->author }}</p>
    <p><strong>Publication Year:</strong> {{ $book->publication_year }}</p>
    <p><strong>Category:</strong> {{ $book->category->name ?? '-' }}</p>
    <p><strong>Subcategory:</strong> {{ $book->subcategory->name ?? '-' }}</p>
    <p><strong>Images:</strong>
        <div>
            @foreach($book->images as $image)
                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Book Image" width="80" height="80">
            @endforeach
        </div>
    </p>
    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
@endsection
