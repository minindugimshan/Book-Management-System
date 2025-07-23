@extends('layout')

@section('content')
    <h1>Add Book</h1>
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}" required>
            @error('author')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="publication_year" class="form-label">Publication Year</label>
            <input type="number" name="publication_year" id="publication_year" class="form-control" value="{{ old('publication_year') }}" required>
            @error('publication_year')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="subcategory_id" class="form-label">Subcategory</label>
            <select name="subcategory_id" id="subcategory_id" class="form-control" required>
                <option value="">Select Subcategory</option>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" data-category="{{ $subcategory->category_id }}" style="display:none;"
                        {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }}>
                        {{ $subcategory->name }}
                    </option>
                @endforeach
            </select>
            @error('subcategory_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="images" class="form-label">Book Images</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple>
            @error('images')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            @error('images.*')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const categorySelect = document.getElementById('category_id');
            const subcategorySelect = document.getElementById('subcategory_id');
            function filterSubcategories() {
                const selectedCategory = categorySelect.value;
                Array.from(subcategorySelect.options).forEach(option => {
                    if (!option.value) return; // skip placeholder
                    option.style.display = option.getAttribute('data-category') === selectedCategory ? '' : 'none';
                });
                // Optionally reset subcategory selection
                subcategorySelect.value = '';
            }
            categorySelect.addEventListener('change', filterSubcategories);
            // Initial filter on page load
            filterSubcategories();
        });
    </script>
@endsection
