<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GenreResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'books' => $this->whenLoaded('books', fn() => $this->books->map(fn($book) => [
                'id' => $book->id,
                'title' => $book->title,
            ])),
        ];
    }
}
