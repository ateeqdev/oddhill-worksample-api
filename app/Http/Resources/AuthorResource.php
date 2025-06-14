<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'biography' => $this->biography,
            'created_at' => $this->created_at?->format(config('api.defaults.format.datetime')),
            'updated_at' => $this->updated_at?->format(config('api.defaults.format.datetime')),
            'books' => $this->whenLoaded('books', fn() => $this->books->map(fn($book) => [
                'id' => $book->id,
                'title' => $book->title,
            ])),
        ];
    }
}
