<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoordenadorRequest extends FormRequest
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
            'horario_atendimento' => ['required', 'string', 'max:255'],
            'email_contato' => ['required', 'email', 'max:255'],
            'sala_atendimento' => ['required', 'string', 'max:255'],
            'professor_id' => ['required', 'integer'],
        ];
    }

    public function messages()
    {
    
        return [
            'horario_atendimento' => [
                'required' => 'O horário de atendimento é obrigatório',
                'max' => 'O horário de atendimento pode ter no máximo 255 caracteres',
            ],
            'email_contato' => [
                'required' => 'O email de contato é obrigatório',
                'email' => 'O email de contato deve ser um email válido',
                'max' => 'O email de contato pode ter no máximo 255 caracteres',
            ],
            'sala_atendimento' => [
                'required' => 'A sala de atendimento é obrigatória',
                'max' => 'A sala de atendimento pode ter no máximo 255 caracteres',
            ],
            'professor_id' => [
                'required' => 'O professor é obrigatório',
            ],
        ];
    }

}