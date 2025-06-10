<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'isbn',
        'description',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The authors that belong to the book.
     */
    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'authors_books');
    }

    /**
     * The genres that belong to the book.
     */
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'books_genres');
    }
}
