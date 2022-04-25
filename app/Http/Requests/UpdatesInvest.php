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
            'name' => ['max:400'],
            'short_name' => ['max:80'],
            'detail_picking' => ['max:400'],
            'comment' => ['max:400'],
            'activ' => ['boolean']
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'Maksymalna ilość znaków to: :max',
            'short_name.max' => 'Maksymalna ilość znaków to: :max',
            'detail_picking' => 'Maksymalna ilość znaków to: :max',
            'comment' => 'Maksymalna ilość znaków to: :max',
        ];
    }
}
