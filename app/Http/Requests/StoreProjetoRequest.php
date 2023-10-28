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
            'titulo' => ['required', 'string'],
            'descricao' => ['required', 'string'],
            'resultados' => ['nullable', 'string'],
            'data_inicio' => ['required', 'date', 'after:01/01/2013'],
            'data_termino' => ['nullable', 'date', 'after:data_inicio', 'before:+10 years'],
            'palavras_chave' => ['required', 'string'],
            'professor_id' => ['required', 'integer'],
            'fomento' => ['nullable', 'string'],
            'link' => ['nullable', 'url'],
            'imagens.*' => ['image']
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'O título é obrigatório',
            'descricao.required' => 'A descrição é obrigatória',
            'resultados.string' => 'Os resultados devem conter texto',
            'data_inicio.required' => 'A data de início é obrigatória',
            'data_inicio.date' => 'A data de início deve ser uma data válida',
            'data_inicio.after' => 'A data de início deve ser dos últimos 10 anos',
            'data_termino.date' => 'A data de término deve ser uma data válida',
            'data_termino.after' => 'A data de término não pode ser antes da data de início',
            'data_termino.before' => 'A data de término não pode passar dos próximos 10 anos',
            'palavras_chave.required' => 'As palavras chave são obrigatórias',
            'professor_id.required' => 'Um professor responsável é obrigatório',
            'link.url' => 'O link deve conter uma URL válida',
            'imagens.*.image' => 'Imagens deve conter apenas imagens'
        ];
    }
}
