<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'isbn' => $this->isbn,
            'description' => $this->description,
            'created_at' => $this->created_at?->format(config('api.defaults.format.datetime')),
            'updated_at' => $this->updated_at?->format(config('api.defaults.format.datetime')),
            'authors' => $this->whenLoaded('authors', fn() => $this->authors->map(fn($author) => [
                'id' => $author->id,
                'name' => $author->name,
            ])),
            'genres' => $this->whenLoaded('genres', fn() => $this->genres->map(fn($genre) => [
                'id' => $genre->id,
                'name' => $genre->name,
            ])),
        ];
    }
}
