<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('image')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_year' => 'required|digits:4|integer|min:1000|max:' . (date('Y')),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $book = Book::create($validated);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            Image::create([
                'book_id' => $book->id,
                'image_path' => $path,
            ]);
        }

        return redirect()->route('books.show', $book->id)->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        $book->load('image');
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $book->load('image');
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_year' => 'required|digits:4|integer|min:1000|max:' . (date('Y')),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $book->update($validated);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($book->image) {
                Storage::disk('public')->delete($book->image->image_path);
                $book->image->delete();
            }
            $path = $request->file('image')->store('images', 'public');
            Image::create([
                'book_id' => $book->id,
                'image_path' => $path,
            ]);
        }

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        // Delete image if exists
        if ($book->image) {
            Storage::disk('public')->delete($book->image->image_path);
            $book->image->delete();
        }
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
