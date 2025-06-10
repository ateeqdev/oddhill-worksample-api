<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Pagination\LengthAwarePaginator;

class BookService
{
    public function getPaginatedBooks(array $filters = []): LengthAwarePaginator
    {
        $per_page = min(
            $filters['per_page'] ?? config('api.defaults.pagination.per_page'),
            config('api.defaults.pagination.max_per_page')
        );

        $query = Book::with(['authors', 'genres']);

        if (isset($filters['title'])) {
            $query->where('title', 'like', "%{$filters['title']}%");
        }

        if (isset($filters['isbn'])) {
            $query->where('isbn', $filters['isbn']);
        }

        return $query->latest()->paginate($per_page);
    }

    public function createBook(array $validated_data): Book
    {
        $book = Book::create($validated_data);

        if (isset($validated_data['author_ids'])) {
            $book->authors()->sync($validated_data['author_ids']);
        }

        if (isset($validated_data['genre_ids'])) {
            $book->genres()->sync($validated_data['genre_ids']);
        }

        return $book->load(['authors', 'genres']);
    }

    public function updateBook(Book $book, array $validated_data): Book
    {
        $book->update($validated_data);

        if (isset($validated_data['author_ids'])) {
            $book->authors()->sync($validated_data['author_ids']);
        }

        if (isset($validated_data['genre_ids'])) {
            $book->genres()->sync($validated_data['genre_ids']);
        }

        return $book->load(['authors', 'genres']);
    }

    public function deleteBook(Book $book): bool
    {
        return $book->delete();
    }
}
