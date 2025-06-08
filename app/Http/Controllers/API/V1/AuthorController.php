<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Services\AuthorService;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    public function __construct(protected AuthorService $author_service)
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    public function index(): JsonResponse
    {
        $authors = $this->author_service->getPaginatedAuthors(request()->all());

        return response()->json([
            'status' => 'success',
            'data' => AuthorResource::collection($authors),
            'meta' => [
                'current_page' => $authors->currentPage(),
                'last_page' => $authors->lastPage(),
                'per_page' => $authors->perPage(),
                'total' => $authors->total(),
            ]
        ]);
    }

    public function show(Author $author): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => new AuthorResource($author->load(['books']))
        ]);
    }

    public function store(AuthorRequest $request): JsonResponse
    {
        $author = $this->author_service->createAuthor($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Author created successfully',
            'data' => new AuthorResource($author)
        ], 201);
    }

    public function update(AuthorRequest $request, Author $author): JsonResponse
    {
        $updated_author = $this->author_service->updateAuthor($author, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Author updated successfully',
            'data' => new AuthorResource($updated_author)
        ]);
    }

    public function destroy(Author $author): JsonResponse
    {
        $this->author_service->deleteAuthor($author);

        return response()->json([
            'status' => 'success',
            'message' => 'Author deleted successfully'
        ]);
    }
}
