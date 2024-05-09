<?php

namespace App\Models\Book;

use App\Models\Store\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $table = 'book';

    protected $fillable = [
        'name',
        'isbn',
        'value',
    ];

    # Relation many-to-many with store table
    public function stores(): BelongsToMany
    {
        return $this->belongsToMany(Store::class);
    }
}
