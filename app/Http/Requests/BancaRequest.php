<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BancaRequest extends FormRequest
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
            'local' => ['required', 'string', 'max:255'],
            'presidente' => ['required', 'integer'],
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
            'local' => [
                'required' => 'O local é obrigatório',
                'max' => 'O local pode ter no máximo 255 caracteres',
            ],
            'presidente' => [
                'required' => 'O presidente é obrigatório',
                'integer' => 'O presidente deve ser um número inteiro',
            ],
        ];
    }

}