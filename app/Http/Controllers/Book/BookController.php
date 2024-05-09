<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\BookRepository\BookRepositoryInterface;

class BookController extends Controller
{
    protected $books;

    public function __construct(BookRepositoryInterface $books)
    {
        $this->books = $books;
    }

    public function index()
    {
        $books = $this->books->all();
        return response()->json($books);
    }

    public function show($id)
    {
        $book = $this->books->find($id);
        return response()->json($book);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'isbn' => 'nullable|integer',
            'value' => 'nullable|numeric'
        ]);

        $book = $this->books->create($validated);
        return response()->json($book, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'isbn' => 'nullable|integer',
            'value' => 'nullable|numeric'
        ]);

        $book = $this->books->update($id, $validated);
        return response()->json($book);
    }

    public function destroy($id)
    {
        $this->books->delete($id);
        return response()->json(['message' => 'Book deleted successfully']);
    }

    public function addStoreToBook(Request $request, $bookId)
    {
        $storeId = $request->store_id;
        $this->books->addStore($bookId, $storeId);
        return response()->json([
            'message' => 'Store added to the book successfully.',
            'book' => $this->books->find($bookId)
        ]);
    }
}
