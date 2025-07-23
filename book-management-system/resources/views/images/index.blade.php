@extends('layout')

@section('content')
    <h1>Images</h1>
    <a href="{{ route('images.create') }}" class="btn btn-primary mb-2">Add Image</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Book</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td>{{ $image->book->title ?? '-' }}</td>
                    <td><img src="{{ asset('storage/' . $image->image_path) }}" alt="Book Image" width="60"></td>
                    <td>
                        <a href="{{ route('images.show', $image) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('images.edit', $image) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('images.destroy', $image) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection 