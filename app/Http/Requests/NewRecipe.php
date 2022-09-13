<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewRecipe extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            
            'recipe_number' => ['string', 'required'],
            'strenght_class' => ['string', 'max:20'],
            'rate_time' => ['integer', 'nullable'],
            'waterproof' => ['max:10', 'nullable'],
            'w_days' => ['integer', 'nullable'],
            'properties' => ['max:400', 'nullable'],
            'comment' => ['max:400', 'nullable'],
            'activ' => ['boolean']
        ];
    }

    public function messages()
    {
        return [
            'recipe_number.required' => 'Wymagany nr receptury - w przypadku braku wpisać "-"',
            'strenght_class.max' => 'Maksymalna ilość znaków to: :max',
            'waterproof.max' => 'Maksymalna ilość znaków to: :max',
            'properties' => 'Maksymalna ilość znaków to: :max',
            'comment' => 'Maksymalna ilość znaków to: :max',
        ];
    }
}
