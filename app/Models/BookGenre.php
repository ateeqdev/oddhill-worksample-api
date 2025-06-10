<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BookGenre extends Pivot
{
    protected $table = 'books_genres';

    protected $fillable = [
        'book_id',
        'genre_id',
    ];

    public $timestamps = false;
}
