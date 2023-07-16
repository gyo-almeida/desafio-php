<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateApplianceRequest extends FormRequest
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
            'name'=>'required',
            'description'=>['required', 'max:255'],
            'voltage'=>'required',
            'brand'=>'required',
            'url'=>['required', 'url', 'max:500']
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'campo name é obrigatório',
            'description.required'=>'campo description é obrigatório',
            'description.max' => 'o campo description deve conter no máximo 255 caracteres',
            'voltage.required'=>'campo voltage é obrigatório',
            'brand.required'=>'campo brand é obrigatório',
            'url.required'=> 'campo url é obrigatório',
            'url.url'=> 'campo url deve ser uma URL válida',
            'url.max'=> 'campo url deve conter até 500 caracteres'
        ];
    }
}
