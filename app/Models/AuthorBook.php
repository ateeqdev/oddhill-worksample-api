<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AuthorBook extends Pivot
{
    protected $table = 'authors_books';

    protected $fillable = [
        'author_id',
        'book_id',
    ];

    public $timestamps = false;
}
