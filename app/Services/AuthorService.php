<?php

namespace App\Services;

use App\Models\Author;
use Illuminate\Pagination\LengthAwarePaginator;

class AuthorService
{
    public function getPaginatedAuthors(array $filters = []): LengthAwarePaginator
    {
        $per_page = min(
            $filters['per_page'] ?? config('api.defaults.pagination.per_page'),
            config('api.defaults.pagination.max_per_page')
        );

        $query = Author::with(['books']);

        if (isset($filters['name'])) {
            $query->where('name', 'like', "%{$filters['name']}%");
        }

        return $query->latest()->paginate($per_page);
    }

    public function createAuthor(array $validated_data): Author
    {
        return Author::create($validated_data);
    }

    public function updateAuthor(Author $author, array $validated_data): Author
    {
        $author->update($validated_data);
        return $author;
    }

    public function deleteAuthor(Author $author): bool
    {
        return $author->delete();
    }
}
