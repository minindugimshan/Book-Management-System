@extends('layout')

@section('content')
    <h1>Edit Image</h1>
    <form action="{{ route('images.update', $image) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="book_id" class="form-label">Book</label>
            <select name="book_id" id="book_id" class="form-control" required>
                <option value="">Select Book</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}" {{ old('book_id', $image->book_id) == $book->id ? 'selected' : '' }}>{{ $book->title }}</option>
                @endforeach
            </select>
            @error('book_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mt-2">
                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Book Image" width="80">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('images.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection 