<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Services\BookService;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    public function __construct(protected BookService $book_service)
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    public function index(): JsonResponse
    {
        $books = $this->book_service->getPaginatedBooks(request()->all());

        return response()->json([
            'status' => 'success',
            'data' => BookResource::collection($books),
            'meta' => [
                'current_page' => $books->currentPage(),
                'last_page' => $books->lastPage(),
                'per_page' => $books->perPage(),
                'total' => $books->total(),
            ]
        ]);
    }

    public function show(Book $book): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => new BookResource($book->load(['authors', 'genres']))
        ]);
    }

    public function store(BookRequest $request): JsonResponse
    {
        $this->authorize('create', Book::class);
        $book = $this->book_service->createBook($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Book created successfully',
            'data' => new BookResource($book)
        ], 201);
    }

    public function update(BookRequest $request, Book $book): JsonResponse
    {
        $this->authorize('update', $book);
        $updated_book = $this->book_service->updateBook($book, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Book updated successfully',
            'data' => new BookResource($updated_book)
        ]);
    }

    public function destroy(Book $book): JsonResponse
    {
        $this->authorize('delete', $book);
        $this->book_service->deleteBook($book);

        return response()->json([
            'status' => 'success',
            'message' => 'Book deleted successfully'
        ]);
    }
}
