<?php

namespace App\Http\Requests\Api;

use App\Enums\ProductType;
use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $types = implode(',', ProductType::TYPES);
        return [
            'name' => 'bail|required|string|max:128',
            'code' => 'bail|required|string|max:16|unique:products,code',
            'type' => 'bail|required|string|in:' . $types,
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
            'in' => 'Wybierz poprawną wartość.',
            'unique' => 'Wartość musi być unikalna.',
        ];
    }
}
