<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatesODB extends FormRequest
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
            'sample_type' =>  ['numeric', 'max:10', 'nullable'],
            'my_comment' => ['max:400', 'nullable'],
        ];
    }

    public function messages()
    {
        return [
            'date.require' => 'Wymagane wpisanie daty pobrania',
            'my_comment' => 'Maksymalna ilość znaków to: :max',
        ];
    }
}
