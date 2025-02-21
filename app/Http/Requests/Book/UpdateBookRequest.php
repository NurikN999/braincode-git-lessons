<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string',
            'author_id' => 'nullable|string|exists:authors,id',
            'published_at' => 'nullable|date'
        ];
    }

    public function messages(): array
    {
        return [
            'author_id.exists' => 'Данного автора не существует'
        ];
    }
}
