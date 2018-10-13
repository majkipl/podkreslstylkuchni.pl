<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUrlRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'url' => 'bail|required|string|max:255|url',
            'product_id' => 'required|integer|exists:products,id',
            'id' => 'required|integer|exists:urls,id'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'required' => 'Pole jest wymagane.',
            'string' => 'Wprowadź wartość tekstową.',
            'max' => 'Pole wymaga maksymalnie :max znaków.',
            'url' => 'Pole powinno posiadać adres URL.',
            'integer' => 'Wprowadź prawidłową wartość',
            'exists' => 'Rekord nie istnieje',
        ];
    }
}
