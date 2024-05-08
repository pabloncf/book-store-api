<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    public function show(Book $book)
    {
        return response()->json($book);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'isbn' => 'nullable|integer',
            'value' => 'nullable|numeric'
        ]);

        $book = Book::create($validated);
        return response()->json($book, 201);
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'isbn' => 'nullable|integer',
            'value' => 'nullable|numeric'
        ]);

        $book->update($validated);
        return response()->json($book);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(['message' => 'Book deleted successfully']);
    }
}
