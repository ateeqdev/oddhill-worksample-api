<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;

class BookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::user()->is_admin;
    }

    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn',
            'description' => 'nullable|string',
        ];

        if ($this->isMethod('PUT')) {
            $rules['isbn'] .= ',' . $this->book->id;
        }

        if ($this->isMethod('POST') || $this->isMethod('PUT')) {
            $rules['author_ids'] = 'sometimes|array';
            $rules['author_ids.*'] = 'exists:authors,id';
            $rules['genre_ids'] = 'sometimes|array';
            $rules['genre_ids.*'] = 'exists:genres,id';
        }

        return $rules;
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422));
    }
}
