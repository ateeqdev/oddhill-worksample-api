<?php

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $this->createAuthors();
        $this->createGenres();
        $this->createBooks();
        $this->attachAuthorBooks();
        $this->attachBookGenres();
    }

    public function down(): void
    {
        DB::table('books_genres')->delete();
        DB::table('authors_books')->delete();
        Book::query()->delete();
        Genre::query()->delete();
        Author::query()->delete();
    }

    private function createAuthors(): void
    {
        Author::factory()->jkRowling()->create();
        Author::factory()->michaelCrichton()->create();
        Author::factory()->brandonSanderson()->create();
        Author::factory()->jrrTolkien()->create();
        Author::factory()->suzanneCollins()->create();
        Author::factory()->harperLee()->create();
        Author::factory()->arthurGolden()->create();
        Author::factory()->oscarWilde()->create();
        Author::factory()->markTwain()->create();
        Author::factory()->sonaCharaipotra()->create();
        Author::factory()->dhonielleClayton()->create();
        Author::factory()->jayKristoff()->create();
        Author::factory()->amieKaufman()->create();
    }

    private function createGenres(): void
    {
        Genre::factory()->youngAdult()->create();
        Genre::factory()->fantasy()->create();
        Genre::factory()->scienceFiction()->create();
        Genre::factory()->fiction()->create();
        Genre::factory()->contemporary()->create();
        Genre::factory()->mystery()->create();
        Genre::factory()->classics()->create();
        Genre::factory()->horror()->create();
        Genre::factory()->romance()->create();
        Genre::factory()->thriller()->create();
    }

    private function createBooks(): void
    {
        Book::factory()->harryPotterChamberSecrets()->create();
        Book::factory()->jurassicPark()->create();
        Book::factory()->fantasticBeasts()->create();
        Book::factory()->skyward()->create();
        Book::factory()->lordOfTheRings()->create();
        Book::factory()->theHobbit()->create();
        Book::factory()->hungerGames()->create();
        Book::factory()->toKillMockingbird()->create();
        Book::factory()->memoirsOfGeisha()->create();
        Book::factory()->pictureOfDorianGray()->create();
        Book::factory()->adventuresOfHuckleberryFinn()->create();
        Book::factory()->tinyPrettyThings()->create();
        Book::factory()->auroraRising()->create();
    }

    private function attachAuthorBooks(): void
    {
        $author_book_relations = [
            ['author_id' => 1, 'book_id' => 1],
            ['author_id' => 2, 'book_id' => 2],
            ['author_id' => 1, 'book_id' => 3],
            ['author_id' => 4, 'book_id' => 9],
            ['author_id' => 4, 'book_id' => 10],
            ['author_id' => 5, 'book_id' => 11],
            ['author_id' => 6, 'book_id' => 12],
            ['author_id' => 9, 'book_id' => 14],
            ['author_id' => 12, 'book_id' => 16],
            ['author_id' => 13, 'book_id' => 16],
            ['author_id' => 14, 'book_id' => 18],
            ['author_id' => 15, 'book_id' => 18],
        ];

        foreach ($author_book_relations as $relation) {
            $author = Author::findOrFail($relation['author_id']);
            $author->books()->attach($relation['book_id']);
        }
    }

    private function attachBookGenres(): void
    {
        $book_genre_relations = [
            ['book_id' => 18, 'genre_id' => 1],
            ['book_id' => 18, 'genre_id' => 2],
            ['book_id' => 18, 'genre_id' => 3],
            ['book_id' => 16, 'genre_id' => 1],
            ['book_id' => 16, 'genre_id' => 5],
            ['book_id' => 16, 'genre_id' => 6],
            ['book_id' => 16, 'genre_id' => 4],
            ['book_id' => 15, 'genre_id' => 7],
            ['book_id' => 15, 'genre_id' => 4],
            ['book_id' => 14, 'genre_id' => 2],
            ['book_id' => 14, 'genre_id' => 4],
            ['book_id' => 14, 'genre_id' => 8],
            ['book_id' => 13, 'genre_id' => 4],
            ['book_id' => 13, 'genre_id' => 9],
            ['book_id' => 12, 'genre_id' => 4],
            ['book_id' => 12, 'genre_id' => 7],
            ['book_id' => 11, 'genre_id' => 1],
            ['book_id' => 11, 'genre_id' => 4],
            ['book_id' => 10, 'genre_id' => 2],
            ['book_id' => 10, 'genre_id' => 4],
            ['book_id' => 10, 'genre_id' => 7],
            ['book_id' => 9, 'genre_id' => 2],
            ['book_id' => 9, 'genre_id' => 4],
            ['book_id' => 9, 'genre_id' => 7],
            ['book_id' => 8, 'genre_id' => 1],
            ['book_id' => 8, 'genre_id' => 2],
            ['book_id' => 8, 'genre_id' => 3],
            ['book_id' => 3, 'genre_id' => 1],
            ['book_id' => 3, 'genre_id' => 2],
            ['book_id' => 3, 'genre_id' => 4],
            ['book_id' => 2, 'genre_id' => 3],
            ['book_id' => 2, 'genre_id' => 4],
            ['book_id' => 2, 'genre_id' => 10],
            ['book_id' => 1, 'genre_id' => 1],
            ['book_id' => 1, 'genre_id' => 2],
            ['book_id' => 1, 'genre_id' => 4],
        ];

        foreach ($book_genre_relations as $relation) {
            $book = Book::find($relation['book_id']);
            $book->genres()->attach($relation['genre_id']);
        }
    }
};
