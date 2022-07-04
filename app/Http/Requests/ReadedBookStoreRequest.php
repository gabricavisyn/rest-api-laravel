<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReadedBookStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'isbn' => 'required|string|max:15|unique:readed_books,isbn',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ];
    }
}
