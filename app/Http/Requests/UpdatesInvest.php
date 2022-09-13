<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatesInvest extends FormRequest
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
            'client_id' => ['integer'],
            'name' => ['max:400', 'required'],
            'short_name' => ['max:80', 'required'],
            'detail_picking' => ['max:400', 'nullable'],
            'comment' => ['max:400', 'nullable'],
            'activ' => ['boolean']
        ];
    }

    public function messages()
    {
        return [
            'client_id.integer' => 'Wybierz Zleceniodawcę',
            'name.max' => 'Maksymalna ilość znaków to: :max',
            'name.required' => 'Wpisz nazwę inwestycji',
            'short_name.max' => 'Maksymalna ilość znaków to: :max',
            'short_name.required' => 'Wpisz nazwę skróconą',
            'detail_picking' => 'Maksymalna ilość znaków to: :max',
            'comment' => 'Maksymalna ilość znaków to: :max',
        ];
    }
}
