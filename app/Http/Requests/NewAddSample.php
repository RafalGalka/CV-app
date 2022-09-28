<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewAddSample extends FormRequest
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
            'number' => ['nullable', 'integer', 'max:100', 'min:0'],
            'mark' => ['string', 'nullable', 'max:200', 'min:0'],
            'picking_date' => ['date'],
            'compression_class' => ['nullable', 'integer', 'max:80', 'min:0'],
            'test_type' => ['required', 'integer', 'max:10', 'min:0'],
            'test_time' => ['nullable', 'integer', 'max:200', 'min:0'],
            'element' => ['nullable', 'string', 'max:500'],
            'natural_conditions' => 'nullable',
            'reinforcement_volume' => ['nullable', 'numeric', 'max:100', 'min:0', 'regex:/^(?:[1-9]\d+|\d)(?:\.\d\d|\.\d)?$/'],
            'my_comment' => ['nullable', 'string', 'max:300'],
            's28' => ['nullable', 'integer', 'max:20', 'min:0'],
            's56' => ['nullable', 'integer', 'max:20', 'min:0'],
        ];
    }

    public function messages()
    {
        return [
            'protocol_number.require' => 'Wymagany nr protokołu',
            'number.integer' => 'Liczba prób to liczba całkowita',
            'number.max' => 'Maksymalna liczba prób to: :max',
            'number.min' => 'Liczba prób nie może być ujemna',
            'element.max' => 'Maksymalna liczba znaków to: :max',
            'my_comment' => 'Maksymalna ilość znaków to: :max',
        ];
    }
}
