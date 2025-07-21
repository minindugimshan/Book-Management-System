@extends('layout')

@section('content')
    <h1>Book Details</h1>
    <div class="card" style="width: 24rem;">
        @if($book->image)
            <img src="{{ asset('storage/' . $book->image->image_path) }}" class="card-img-top" alt="Book Image">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
            <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
            <p class="card-text"><strong>Publication Year:</strong> {{ $book->publication_year }}</p>
            <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
@endsection
