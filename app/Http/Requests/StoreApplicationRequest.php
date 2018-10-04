<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
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
        return [
            'firstname' => 'bail|required|string|min:3|max:128',
            'lastname' => 'bail|required|string|min:3|max:128',
            'email' => 'bail|required|email:rfc,dns|unique:applications,email',
            'phone' => [
                'bail',
                'required',
                'regex:/^\+48(\s)?([1-9]\d{8}|[1-9]\d{2}\s\d{3}\s\d{3}|[1-9]\d{1}\s\d{3}\s\d{2}\s\d{2}|[1-9]\d{1}\s\d{2}\s\d{3}\s\d{2}|[1-9]\d{1}\s\d{2}\s\d{2}\s\d{3}|[1-9]\d{1}\s\d{4}\s\d{2}|[1-9]\d{2}\s\d{2}\s\d{2}\s\d{2}|[1-9]\d{2}\s\d{3}\s\d{2}|[1-9]\d{2}\s\d{4})$/'
            ],
            'address' => 'bail|required|string|max:255',
            'address_nb' => 'bail|required|string|max:16',
            'zip' => 'bail|required|regex:/^[0-9]{2}\-[0-9]{3}$/',
            'city' => 'bail|required|string|min:2|max:64',
            'img_receipt' => 'bail|required|file|mimes:jpeg,jpg,png|max:4096',
            'img_ean' => 'bail|required|file|mimes:jpeg,jpg,png|max:4096',
            'img_box' => 'bail|required|file|mimes:jpeg,jpg,png|max:4096',
            'legal_1' => 'bail|required',
            'legal_2' => 'bail|required',
            'legal_3' => 'bail|required',
            'legal_4' => 'bail',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Pole jest wymagane.',
            'string' => 'Wprowadź wartość tekstową.',
            'min' => 'Pole wymaga minimum :min znaków.',
            'max' => 'Pole wymaga maksymalnie :max znaków.',
            'date_format' => 'Niewłaściwy format daty. Oczekiwany format: DD-MM-YYYY.',
            'before_or_equal' => 'Musisz mieć co najmniej 18 lat, aby się zarejestrować.',
            'regex' => 'Błędny format wprowadzonych danych.',
            'email' => 'Błędny format wprowadzonych danych.',
            'unique' => 'Adres e-mail jest już zajęty.',
            'number' => 'Wybierz prawidłową wartość.',
            'exists' => 'Wybierz prawidłową wartość.',
            'file' => 'Pole wymaga pliku.',
            'mimes' => 'Dopuszczalne typy plików jpeg,jpg,png.',
            'img_receipt.max' => 'Plik nie może być większy niż 4MB.',
            'img_tip.max' => 'Plik nie może być większy niż 4MB.',
            'img_tip.required_without' => 'Pole obrazu jest wymagane, jeśli pole URL wideo jest puste.',
            'video_url.required_without' => 'Pole URL wideo jest wymagane, jeśli pole obrazu nie jest wypełnione.',
            'video_url.regex' => 'Nieprawidłowy format adresu URL. Akceptowane są tylko linki z YouTube lub Vimeo.',
        ];
    }
}
