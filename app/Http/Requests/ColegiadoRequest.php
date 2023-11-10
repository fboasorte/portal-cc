<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColegiadoRequest extends FormRequest
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
            'numero_portaria' => ['required', 'string', 'max:255'],
            'vigencia_inicio' => ['required', 'date', 'after:01/01/2013'],
            'vigencia_fim' => ['required', 'date', 'after:01/01/2013'],
            'atual' => ['required', 'boolean'],
            'professor_interno' => ['required', 'integer'],
            'alunos' => ['required', 'integer'],
            'servidores' => ['required', 'integer'],

            
        ];
    }

    public function messages()
    {
        return [
            'numero_portaria' => [
                'required' => 'O número da portaria é obrigatório',
                'max' => 'O número da portaria pode ter no máximo 255 caracteres',
            ],
            'vigencia_inicio' => [
                'required' => 'A vigência de início é obrigatória',
                'date' => 'A vigência de início deve ser uma data válida',
                'after' => 'A vigência de início deve ser dos últimos 10 anos',
            ],
            'vigencia_fim' => [
                'required' => 'A vigência de fim é obrigatória',
                'date' => 'A vigência de fim deve ser uma data válida',
                'after' => 'A vigência de fim deve ser dos últimos 10 anos',
            ],
            'atual' => [
                'required' => 'O campo atual é obrigatório',
                'boolean' => 'O campo atual deve ser um booleano',
            ],
            'professor_interno' => [
                'required' => 'O professor interno é obrigatório',
                'integer' => 'O professor interno deve ser um número inteiro',
            ],
            'alunos' => [
                'required' => 'O número de alunos é obrigatório',
                'integer' => 'O número de alunos deve ser um número inteiro',
            ],
            'servidores' => [
                'required' => 'O número de servidores é obrigatório',
                'integer' => 'O número de servidores deve ser um número inteiro',
            ],
        ];
    }

}