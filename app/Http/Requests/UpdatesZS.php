<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatesZS extends FormRequest
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
            'recipe' => ['string', 'max:100', 'nullable'],
            'compression_class' =>  ['numeric', 'max:80', 'nullable'],
            'bending_class' =>  ['numeric', 'max:80', 'nullable'],
            'element' => ['string', 'max:300', 'nullable'],
            'my_comment' => ['max:400', 'nullable'],
            'days_28' =>  ['numeric', 'max:20', 'nullable'],
            'days_7' =>  ['numeric', 'max:20', 'nullable'],
            'days_56' =>  ['numeric', 'max:20', 'nullable'],
            'volume_A' =>  ['numeric', 'max:20', 'nullable'],
            'day_A' =>  ['numeric', 'max:20', 'nullable'],
            'time' =>  ['nullable'],
        ];
    }

    public function messages()
    {
        return [
            'date.require' => 'Wymagane wpisanie daty pobrania',
            'my_comment.max' => 'Maksymalna ilość znaków komentarza to: :max',
        ];
    }
}
