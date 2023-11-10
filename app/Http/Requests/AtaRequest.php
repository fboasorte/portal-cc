<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtaRequest extends FormRequest
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
                'data' => ['required', 'date', 'after:01/01/2013'],
                'colegiado' => ['required', 'integer'],
                'descricao' => ['required', 'string', 'max:255'],
            ];
        }
    
        public function messages()
        {
            return [
                'data' => [
                    'required' => 'A data é obrigatória',
                    'date' => 'A data deve ser uma data válida',
                    'after' => 'A data deve ser dos últimos 10 anos',
                ],
                'colegiado' => [
                    'required' => 'O colegiado é obrigatório',
                    'integer' => 'O colegiado deve ser um número inteiro',
                ],
                'descricao' => [
                    'required' => 'A descrição é obrigatória',
                    'max' => 'A descrição pode ter no máximo 255 caracteres',
                ],
            ];
        }

}