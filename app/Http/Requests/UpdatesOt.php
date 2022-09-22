<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatesOt extends FormRequest
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
            'number_of_sample' => ['numeric', 'max:300', 'nullable'],
            'test_type' =>  ['numeric', 'max:20', 'nullable'],
            'my_comment' => ['max:400', 'nullable'],
        ];
    }

    public function messages()
    {
        return [
            'date.require' => 'Wymagane wpisanie daty pobrania',
            'compression_class.max' => 'Maksymalna ilość znaków to: :max',
            'waterproof.max' => 'Maksymalna ilość znaków to: :max',
            'my_comment' => 'Maksymalna ilość znaków to: :max',
        ];
    }
}
