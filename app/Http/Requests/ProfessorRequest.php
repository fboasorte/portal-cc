<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorRequest extends FormRequest
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
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            
        ];
    }

    public function messages()
    {
        return [
            'nome' => [
                'required' => 'O nome é obrigatório',
                'max' => 'O nome pode ter no máximo 255 caracteres',
            ],
            'email' => [
                'required' => 'O email é obrigatório',
                'email' => 'O email deve ser um email válido',
                'max' => 'O email pode ter no máximo 255 caracteres',
            ],
        ];
    }


}