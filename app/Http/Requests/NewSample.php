<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewSample extends FormRequest
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
            'protocol_number' => 'required',
            'number' => ['nullable', 'integer', 'max:30', 'min:0'],
            'wz_number' => ['nullable', 'max:200', 'min:0'],
            'hour' => 'nullable',
            'natural_conditions' => 'nullable',
            'consistency' => ['nullable', 'integer', 'max:300', 'min:0'],
            'temperature' => ['nullable', 'numeric', 'max:60', 'min:-30', 'regex:/^(?:[1-9]\d+|\d)(?:\.\d)?$/'],
            'air_content' => ['nullable', 'numeric', 'max:20', 'min:0', 'regex:/^(?:[1-9]\d+|\d)(?:\.\d)?$/'],
            'reinforcement_volume' => ['nullable', 'numeric', 'max:100', 'min:0', 'regex:/^(?:[1-9]\d+|\d)(?:\.\d\d|\.\d)?$/'],
            'my_comment' => ['nullable', 'string', 'max:300'],
            'sample_type' => ['required', 'integer']
        ];
    }

    public function messages()
    {
        return [
            'protocol_number.require' => 'Wymagany nr protokołu',
            'number.integer' => 'Liczba prób to liczba całkowita',
            'number.max' => 'Maksymalna liczba prób to: :max',
            'number.min' => 'Liczba prób nie może być ujemna',
            'temperature.max' => 'Maksymalna temperatura to: :max',
            'temperature.min' => 'Minimalna temperatura to: :min',
            'temperature.regex' => 'Liczba do 1 miejsca dziesiętnych oddzielonych kropką',
            'air_content.regex' => 'Liczba do 1 miejsca dziesiętnego oddzielonego kropką',
            'air_content.numeric' => 'Zawartość powietrza musi być liczbą',
            'air_content.min' => 'Zawartość powietrza musi być dodatnie',
            'reinforcement_volume.numeric' => 'Zawartość zbrojenia musi być liczbą',
            'reinforcement_volume.min' => 'Zawartość zbrojenia nie może być ujemne',
            'reinforcement_volume.regex' => 'Liczba do 2 miejsc dziesiętnych oddzielonych kropką',
            'my_comment' => 'Maksymalna ilość znaków to: :max',
        ];
    }
}
