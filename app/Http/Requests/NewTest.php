<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewTest extends FormRequest
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
            'protocol_number' => ['required', 'integer'],
            'sample_number' => ['nullable', 'integer'],
            'date' => ['required', 'date'],
            'time' => ['nullable'],
            'weight' => ['required', 'integer', 'max:9999', 'min:0'],
            'force' => ['required', 'integer', 'max:3000', 'min:0'],
            'test_type' => ['required', 'integer', 'max:9', 'min:0'],
            'notes' => ['string', 'max:250', 'nullable'],
        ];
    }

    public function messages()
    {
        return [
            'date.require' => 'Wymagana data badania',
            'weight.require' => 'Wymagana waga próbki',
            'weight.max' => 'Maksymalna waga to: :max',
            'weight.min' => 'Waga nie może być ujemna',
            'force.require' => 'Wymagana siła niszcząca',
            'force.max' => 'Maksymalna siła to: :max',
            'force.min' => 'Siła nie może być ujemna',
            'notes' => 'Maksymalna ilość znaków to: :max',
        ];
    }
}
