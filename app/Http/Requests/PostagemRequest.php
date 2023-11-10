<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostagemRequest extends FormRequest
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
            'titulo' => ['required','string', 'max:255'],
            'texto' => ['required', 'string','max:65535' ],
            'tipo_postagem_id' => ['required', 'integer'],
            'menu_inicial' => ['nullable'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'titulo' => [
                'required' => 'O título é obrigatório',
                'max' => 'O tamanho máximo do título é 255 caracteres',
            ],
            'texto' => [
                'required' => 'O texto é obrigatório',
                'max' => 'O tamanho máximo do texto é 65535 caracteres',
            ],
            'tipo_postagem_id' => [
                'required' => 'O tipo de postagem é obrigatório',
            ],
        ];
           
    }
}
