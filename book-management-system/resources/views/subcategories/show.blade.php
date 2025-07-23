@extends('layout')

@section('content')
    <h1>Subcategory Details</h1>
    <p><strong>ID:</strong> {{ $subcategory->id }}</p>
    <p><strong>Name:</strong> {{ $subcategory->name }}</p>
    <p><strong>Main Category:</strong> {{ $subcategory->category->name ?? '-' }}</p>
    <a href="{{ route('subcategories.edit', $subcategory) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('subcategories.index') }}" class="btn btn-secondary">Back</a>
@endsection 