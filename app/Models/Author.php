<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'biography',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The books that belong to the author.
     */
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'authors_books');
    }
}
