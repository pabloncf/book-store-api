<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Store\Store;
use Illuminate\Http\Request;
use App\Repositories\StoreRepository\StoreRepositoryInterface;

class StoreController extends Controller
{
    protected $stores;

    public function __construct(StoreRepositoryInterface $stores)
    {
        $this->stores = $stores;
    }

    public function index()
    {
        $stores = $this->stores->all();
        return response()->json($stores);
    }

    public function show($id)
    {
        $store = $this->stores->find($id);
        return response()->json($store);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'active' => 'required|boolean'
        ]);

        $store = $this->stores->create($validated);
        return response()->json($store, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'active' => 'sometimes|boolean'
        ]);

        $store = $this->stores->update($id, $validated);
        return response()->json($store);
    }

    public function destroy($id)
    {
        $this->stores->delete($id);
        return response()->json(['message' => 'Store deleted successfully']);
    }

    public function addBookToStore(Request $request, $storeId)
    {
        $bookId = $request->book_id;
        $this->stores->addBook($storeId, $bookId);
        return response()->json([
            'message' => 'Book added to the store successfully.',
            'store' => $this->stores->find($storeId)
        ]);
    }
}
