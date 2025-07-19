


<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $book->title ?? '') }}" required>
    @error('title') <div class="text-danger">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label>Author</label>
    <input type="text" name="author" class="form-control" value="{{ old('author', $book->author ?? '') }}" required>
    @error('author') <div class="text-danger">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label>Publication Year</label>
    <input type="number" name="publication_year" class="form-control" value="{{ old('publication_year', $book->publication_year ?? '') }}" required>
    @error('publication_year') <div class="text-danger">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    @if(isset($book) && $book->image)
        <img src="{{ asset('storage/' . $book->image->image_path) }}" width="80" class="mt-2">
    @endif
    @error('image') <div class="text-danger">{{ $message }}</div> @enderror
</div>
