<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplianceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['sometimes', 'max:120'],
            'description'=>['sometimes', 'max:255'],
            'voltage'=>['sometimes', 'max:5'],
            'brand'=>['sometimes', 'max:10'],
            'url'=>['sometimes', 'url', 'max:500']
        ];
    }

    public function messages()
    {
        return [
            'description.max' => 'o campo description deve conter no máximo 255 caracteres',
            'url.url'=> 'campo url deve ser uma URL válida',
            'url.max'=> 'campo url deve conter até 500 caracteres'
        ];
    }
}
