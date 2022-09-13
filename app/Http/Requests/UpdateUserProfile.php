<?php

namespace App\Http\Requests;

use App\Rules\AlphaSpaces;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfile extends FormRequest
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
        $userId = Auth::id();

        return [
            'email' => [
                'required',
                'unique:users',
                Rule::unique('users')->ignore($userId),
                'email'
            ],
            'name' => [
                'required',
                'max:50',
                new AlphaSpaces()
            ],
            'phone' => [
                'min:6'
            ],
            //'avatar' => 'dimensions:min_width=100,min_height=200,max_width=100,max_height=200'
            //'avatar' => 'nullable|file|image|dimensions:ratio=3/2',
            'avatar' => 'nullable|file|image',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Podany adres email jest zajęty',
            'name.max' => 'Maksymalna ilość znaków to: :max'
        ];
    }
}
