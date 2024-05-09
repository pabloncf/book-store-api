<?php

namespace App\Repositories\StoreRepository;

use App\Models\Store\Store;

class StoreRepository implements StoreRepositoryInterface
{
    public function all()
    {
        return Store::all();
    }

    public function find($id)
    {
        return Store::findOrFail($id);
    }

    public function create(array $data)
    {
        return Store::create($data);
    }

    public function update($id, array $data)
    {
        $store = $this->find($id);
        $store->update($data);
        return $store;
    }

    public function delete($id)
    {
        $store = $this->find($id);
        $store->delete();
    }

    public function addBook($storeId, $bookId)
    {
        $store = $this->find($storeId);
        $store->books()->syncWithoutDetaching([$bookId]);
    }
}
