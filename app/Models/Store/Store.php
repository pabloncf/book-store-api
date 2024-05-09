<?php

namespace App\Models\Store;

use App\Models\Book\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Store extends Model
{
    use HasFactory;

    protected $table = 'store';

    protected $fillable = [
        'name',
        'address',
        'active'
    ];

    # Relation many-to-many with book table
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }
}
