<?php
namespace App\Repositories\BookRepository;

use App\Models\Book\Book;

class BookRepository implements BookRepositoryInterface
{
    public function all()
    {
        return Book::all();
    }

    public function find($id)
    {
        return Book::findOrFail($id);
    }

    public function create(array $data)
    {
        return Book::create($data);
    }

    public function update($id, array $data)
    {
        $book = $this->find($id);
        $book->update($data);
        return $book;
    }

    public function delete($id)
    {
        $book = $this->find($id);
        $book->delete();
    }

    public function addStore($bookId, $storeId)
    {
        $book = $this->find($bookId);
        $book->stores()->syncWithoutDetaching([$storeId]);
    }
}
