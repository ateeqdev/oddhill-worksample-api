<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use App\Services\GenreService;
use Illuminate\Http\JsonResponse;

class GenreController extends Controller
{
    public function __construct(protected GenreService $genre_service)
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    public function index(): JsonResponse
    {
        $genres = $this->genre_service->getPaginatedGenres(request()->all());

        return response()->json([
            'status' => 'success',
            'data' => GenreResource::collection($genres),
            'meta' => [
                'current_page' => $genres->currentPage(),
                'last_page' => $genres->lastPage(),
                'per_page' => $genres->perPage(),
                'total' => $genres->total(),
            ]
        ]);
    }

    public function show(Genre $genre): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => new GenreResource($genre->load(['books']))
        ]);
    }

    public function store(GenreRequest $request): JsonResponse
    {
        $this->authorize('create', Genre::class);
        $genre = $this->genre_service->createGenre($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Genre created successfully',
            'data' => new GenreResource($genre)
        ], 201);
    }

    public function update(GenreRequest $request, Genre $genre): JsonResponse
    {
        $this->authorize('update', $genre);
        $updated_genre = $this->genre_service->updateGenre($genre, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Genre updated successfully',
            'data' => new GenreResource($updated_genre)
        ]);
    }

    public function destroy(Genre $genre): JsonResponse
    {
        $this->authorize('delete', $genre);
        $this->genre_service->deleteGenre($genre);

        return response()->json([
            'status' => 'success',
            'message' => 'Genre deleted successfully'
        ]);
    }
}
