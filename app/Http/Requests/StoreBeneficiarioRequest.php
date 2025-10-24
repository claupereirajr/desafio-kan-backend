<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBeneficiarioRequest extends FormRequest
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
     * [
     *  "beneficiario" = [
     *   "nome" => "required|string|max:255",
     *   "telefone" => "required|string|max:20",
     *   "dataNascimento" => "required|date",
     *  ],
     *  "documentos" = [
     *   [
     *    "tipoDocumento",=> in_list['RG', 'CPF', 'CNH', 'Passaporte', 'Outros'],
     *    "descricao"=> "required|max:100"
     *   ],
     *   [
     *    "tipoDocumento",=> in_list['RG', 'CPF', 'CNH', 'Passaporte', 'Outros'],
     *    "descricao"=> "required|max:100"
     *   ],
     *   ...
     *  ]
     * ]
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'beneficiario' => [
                'nome' => 'required|string|max:255',
                'telefone' => 'required|string|max:20',
                'dataNascimento' => 'required|date|before:tomorrow',
            ],
            'documentos' => [
                'required',
                'array',
                'min:1',
                'max:3',
            ],
            'documentos.*.tipoDocumento' => 'required|in_list:RG,CPF,CNH,Passaporte,Outros',
            'documentos.*.descricao' => 'required|max:100',
        ];
    }
}
