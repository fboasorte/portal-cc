<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
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
            'carga_horaria' => ['required', 'integer', 'gt:0'],
            'nome' => ['required', 'string', 'max:255', 'unique:curso,nome,' . $this->id],
            'sigla' => ['required', 'string', 'max:255', 'unique:curso,sigla, ' . $this->id],
            'turno' => ['required', 'string', 'max:255']
        ];
    }

    public function messages()
    {
        return [
            'carga_horaria' => [
                'required' => 'A carga horária é obrigatória',
                'integer' => 'A carga horária é um inteiro',
                'gt' => 'A carga horário deve ser positiva'
            ],
            'nome' => [
                'required' => 'O nome é obrigatório',
                'string' => 'O nome deve conter texto',
                'max' => 'O nome deve ter no máximo 255 caracteres',
                'unique' => 'O nome deve ser único',
            ],
            'sigla' => [
                'required' => 'A sigla é obrigatória',
                'string' => 'A sigla deve conter texto',
                'max' => 'A sigla deve ter no máximo 255 caracteres',
                'unique' => 'A sigla deve ser única',
            ],
            'turno' => [
                'required' => 'O turno é obrigatório',
                'max' => 'O turno deve ter no máximo 255 caracteres',
            ],
        ];
    }
}
