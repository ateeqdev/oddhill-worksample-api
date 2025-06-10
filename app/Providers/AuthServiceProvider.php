<?php

namespace App\Providers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Policies\AuthorPolicy;
use App\Policies\BookPolicy;
use App\Policies\GenrePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Author::class => AuthorPolicy::class,
        Book::class => BookPolicy::class,
        Genre::class => GenrePolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
