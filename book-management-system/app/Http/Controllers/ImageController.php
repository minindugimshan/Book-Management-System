<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::with('book')->get();
        return view('images.index', compact('images'));
    }

    public function create()
    {
        $books = Book::all();
        return view('images.create', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $path = $request->file('image')->store('book_images', 'public');
        Image::create([
            'book_id' => $request->book_id,
            'image_path' => $path,
        ]);
        return redirect()->route('images.index')->with('success', 'Image uploaded successfully.');
    }

    public function show(Image $image)
    {
        $image->load('book');
        return view('images.show', compact('image'));
    }

    public function edit(Image $image)
    {
        $books = Book::all();
        return view('images.edit', compact('image', 'books'));
    }

    public function update(Request $request, Image $image)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = ['book_id' => $request->book_id];
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($image->image_path);
            $data['image_path'] = $request->file('image')->store('book_images', 'public');
        }
        $image->update($data);
        return redirect()->route('images.index')->with('success', 'Image updated successfully.');
    }

    public function destroy(Image $image)
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();
        return redirect()->route('images.index')->with('success', 'Image deleted successfully.');
    }
} 