<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPOB extends FormRequest
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
            'date' => ['date', 'required', 'before_or_equal:today'],
            'drive' => ['boolean'],
            'air_temp' => ['numeric', 'nullable', 'max:70', 'min:-30', 'regex:/^(?:[1-9]\d+|\d)(?:\.\d)?$/'],
            'recipe' => ['string'],
            'compression_class' => ['string', 'max:30'],
            'rate_time' => ['integer', 'nullable', 'max:90', 'min:1'],
            'waterproof' => ['max:10', 'nullable'],
            'element' => ['string', 'nullable', 'max:450'],
            'days_28' => ['integer', 'nullable', 'max:30', 'min:0'],
            'days_56' => ['integer', 'nullable', 'max:30', 'min:0'],
            'days_7' => ['integer', 'nullable', 'max:30', 'min:0'],
            'volume_phone' => ['integer', 'nullable', 'max:30', 'min:0'],
            'volume_W' => ['integer', 'nullable', 'max:30', 'min:0'],
            'type_A' => ['integer', 'nullable'],
            'volume_A' => ['integer', 'nullable', 'max:30', 'min:0'],
            'day_A' => ['integer', 'nullable'],
            'type_B' => ['integer', 'nullable'],
            'volume_B' => ['integer', 'nullable', 'max:30', 'min:0'],
            'day_B' => ['integer', 'nullable'],
            'type_C' => ['integer', 'nullable'],
            'volume_C' => ['integer', 'nullable', 'max:30', 'min:0'],
            'day_C' => ['integer', 'nullable'],
            'my_comment' => ['max:400', 'nullable'],
            'lab_id' => ['integer', 'nullable', 'min:0'],
            'invest_id' => ['integer', 'nullable', 'min:0'],
        ];
    }

    public function messages()
    {
        return [
            'date.require' => 'Wymagane wpisanie daty pobrania',
            'date.before_or_equal' => 'Data nie może być z przyszłości',
            'air_temp.regex' => 'Liczba do 1 miejsca dziesiętnego oddzielonego kropką',
            'compression_class.max' => 'Maksymalna ilość znaków to: :max',
            'compression_class.string' => 'Wybierz recepturę z klasą wytrzmałości',
            'waterproof.max' => 'Maksymalna ilość znaków to: :max',
            'comment' => 'Maksymalna ilość znaków to: :max',
        ];
    }
}
