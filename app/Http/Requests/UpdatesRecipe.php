<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatesRecipe extends FormRequest
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
            'investment_id' => ['integer'],
            'recipe_number' => ['string'],
            'strenght_class' => ['string', 'max:30'],
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
            'strenght_class.max' => 'Maksymalna ilość znaków to: :max',
            'waterproof.max' => 'Maksymalna ilość znaków to: :max',
            'properties' => 'Maksymalna ilość znaków to: :max',
            'comment' => 'Maksymalna ilość znaków to: :max',
        ];
    }
}
