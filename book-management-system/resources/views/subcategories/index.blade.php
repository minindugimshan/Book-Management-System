@extends('layout')

@section('content')
    <h1>Subcategories</h1>
    <a href="{{ route('subcategories.create') }}" class="btn btn-primary mb-2">Add Subcategory</a>
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
                <th>Name</th>
                <th>Main Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subcategories as $subcategory)
                <tr>
                    <td>{{ $subcategory->id }}</td>
                    <td>{{ $subcategory->name }}</td>
                    <td>{{ $subcategory->category->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('subcategories.show', $subcategory) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('subcategories.edit', $subcategory) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('subcategories.destroy', $subcategory) }}" method="POST" style="display:inline-block;">
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