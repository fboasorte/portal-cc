<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjetoRequest extends FormRequest
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
            'descricao' => ['required'],
            'resultados' => ['nullable'],
            'data_inicio' => ['required'],
            'data_termino' => ['nullable', 'after:data_inicio'],
            'palavras_chave' => ['required'],
            'professor_id' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'descricao.required' => 'A descrição é obrigatória',
            'data_inicio.required' => 'A data de início é obrigatória',
            'data_termino.after' => 'A data de término não pode ser antes da data de início',
            'palavras_chave.required' => 'As palavras chave são obrigatórias',
            'professor_id.required' => 'Um professor responsável é obrigatório'
        ];
    }
}
