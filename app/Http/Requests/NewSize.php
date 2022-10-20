<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewSize extends FormRequest
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
            'protocol_number' => ['required', 'integer'],
            'sample_number' => ['nullable', 'integer'],
            'x1' => ['nullable', 'decimal', 'max:300', 'min:0'],
            'x2' => ['nullable', 'decimal', 'max:300', 'min:0'],
            'x3' => ['nullable', 'decimal', 'max:300', 'min:0'],
            'x4' => ['nullable', 'decimal', 'max:300', 'min:0'],
            'x5' => ['nullable', 'decimal', 'max:300', 'min:0'],
            'x6' => ['nullable', 'decimal', 'max:300', 'min:0'],
            'y1' => ['nullable', 'decimal', 'max:300', 'min:0'],
            'y2' => ['nullable', 'decimal', 'max:300', 'min:0'],
            'y3' => ['nullable', 'decimal', 'max:300', 'min:0'],
            'y4' => ['nullable', 'decimal', 'max:300', 'min:0'],
            'y5' => ['nullable', 'decimal', 'max:300', 'min:0'],
            'y6' => ['nullable', 'decimal', 'max:300', 'min:0'],
            'z1' => ['nullable', 'decimal', 'max:300', 'min:0'],
            'z2' => ['nullable', 'decimal', 'max:300', 'min:0'],
            'z3' => ['nullable', 'decimal', 'max:300', 'min:0'],
            'z4' => ['nullable', 'decimal', 'max:300', 'min:0'],
            'lab_id' => ['required', 'integer', 'max:30', 'min:0'],
            'perpendicularity' => ['required', 'boolean'],
            'flatness' => ['required', 'boolean'],
            'notes' => ['string', 'max:300', 'nullable'],
        ];
    }

    public function messages()
    {
        return [
            'notes' => 'Maksymalna ilość znaków to: :max',
        ];
    }
}
