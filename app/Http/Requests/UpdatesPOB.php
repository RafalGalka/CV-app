<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatesPOB extends FormRequest
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
            'date' => ['date', 'required'],
            'drive' => ['boolean'],
            'air_temp' => ['numeric', 'nullable'],
            'recipe' => ['string'],
            'compression_class' => ['string', 'max:30'],
            'rate_time' => ['integer', 'nullable'],
            'waterproof' => ['max:10', 'nullable'],
            'element' => ['string', 'nullable'],
            'days_28' => ['integer', 'nullable'],
            'days_56' => ['integer', 'nullable'],
            'days_7' => ['integer', 'nullable'],
            'volume_phone' => ['integer', 'nullable'],
            'volume_W' => ['integer', 'nullable'],
            'type_A' => ['integer', 'nullable'],
            'volume_A' => ['integer', 'nullable'],
            'day_A' => ['integer', 'nullable'],
            'type_B' => ['integer', 'nullable'],
            'volume_B' => ['integer', 'nullable'],
            'day_B' => ['integer', 'nullable'],
            'type_C' => ['integer', 'nullable'],
            'volume_C' => ['integer', 'nullable'],
            'day_C' => ['integer', 'nullable'],
            'my_comment' => ['max:400', 'nullable'],
            'btn' => ['nullable'],
            'inv_id' => ['integer', 'nullable'],
        ];
    }

    public function messages()
    {
        return [
            'date.require' => 'Wymagane wpisanie daty pobrania',
            'compression_class.max' => 'Maksymalna ilość znaków to: :max',
            'waterproof.max' => 'Maksymalna ilość znaków to: :max',
            'comment' => 'Maksymalna ilość znaków to: :max',
        ];
    }
}
