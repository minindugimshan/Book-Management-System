@extends('layout')

@section('content')
    <h1>Add Book</h1>
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('books.form')
        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
