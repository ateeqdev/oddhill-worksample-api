<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GenreFactory extends Factory
{
    protected $model = Genre::class;

    public function definition(): array
    {
        return [
            'name' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    public function youngAdult(): static
    {
        return $this->state([
            'id' => 1,
            'name' => 'Young Adult',
        ]);
    }

    public function fantasy(): static
    {
        return $this->state([
            'id' => 2,
            'name' => 'Fantasy',
        ]);
    }

    public function scienceFiction(): static
    {
        return $this->state([
            'id' => 3,
            'name' => 'Science Fiction',
        ]);
    }

    public function fiction(): static
    {
        return $this->state([
            'id' => 4,
            'name' => 'Fiction',
        ]);
    }

    public function contemporary(): static
    {
        return $this->state([
            'id' => 5,
            'name' => 'Contemporary',
        ]);
    }

    public function mystery(): static
    {
        return $this->state([
            'id' => 6,
            'name' => 'Mystery',
        ]);
    }

    public function classics(): static
    {
        return $this->state([
            'id' => 7,
            'name' => 'Classics',
        ]);
    }

    public function horror(): static
    {
        return $this->state([
            'id' => 8,
            'name' => 'Horror',
        ]);
    }

    public function romance(): static
    {
        return $this->state([
            'id' => 9,
            'name' => 'Romance',
        ]);
    }

    public function thriller(): static
    {
        return $this->state([
            'id' => 10,
            'name' => 'Thriller',
        ]);
    }
}
