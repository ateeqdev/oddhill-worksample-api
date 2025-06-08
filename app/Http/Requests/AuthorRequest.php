<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;

class AuthorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::user()->is_admin;
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'biography' => 'required|string',
        ];

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
