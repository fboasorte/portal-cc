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
        //duvida em relação ao tipo de dado, 
        // atual é tinyint
        // numero_portaria é int
        return [ 
            'numero_portaria' => ['required', 'integer'],
            'vigencia_inicio' => ['required', 'date', 'after:01/01/2013'],
            'vigencia_fim' => ['required', 'date', 'after:vigencia_inicio'],
            'atual' => ['required', 'integer'],
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
                'after' => 'A vigência de fim deve ser depois da vigência de início',
            ],
            'atual' => [
                'required' => 'O campo atual é obrigatório',
            ],
            'professor_interno' => [
                'required' => 'É obrigatório 4 professores',
            ],
            'alunos' => [
                'required' => 'O número de alunos é 1 e no máximo 4 alunos',
            ],
            'servidores' => [
                'required' => 'O número de servidores é 1 e no máximo 4 para técnicos administrativos',
            ],
        ];
    }

}