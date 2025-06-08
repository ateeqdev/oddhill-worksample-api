<?php

namespace App\Services;

use App\Models\Genre;
use Illuminate\Pagination\LengthAwarePaginator;

class GenreService
{
    public function getPaginatedGenres(array $filters = []): LengthAwarePaginator
    {
        $per_page = min(
            $filters['per_page'] ?? config('api.defaults.pagination.per_page'),
            config('api.defaults.pagination.max_per_page')
        );

        $query = Genre::with(['books']);

        if (isset($filters['name'])) {
            $query->where('name', 'like', "%{$filters['name']}%");
        }

        return $query->latest()->paginate($per_page);
    }

    public function createGenre(array $validated_data): Genre
    {
        return Genre::create($validated_data);
    }

    public function updateGenre(Genre $genre, array $validated_data): Genre
    {
        $genre->update($validated_data);
        return $genre;
    }

    public function deleteGenre(Genre $genre): bool
    {
        return $genre->delete();
    }
}
