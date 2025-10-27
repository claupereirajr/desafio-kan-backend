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
     * Request:
     * {
     *  "beneficiario": {
     *      "nome": "batata",
     *      "telefone": "1234567",
     *      "dataNascimento": "12-12-2020"
     *  },
     *  "documentos": [
     *      {
     *          "tipoDocumento": "CNH",
     *          "descricao": "1234567890"
     *      },
     *      {
     *          "tipoDocumento": "RG",
     *          "descricao": "1234567890"
     *      }
     *  ]
     *  }
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'beneficiario.nome' => 'required|string|max:128|unique:beneficiarios,nome',
            'beneficiario.telefone' => 'required|string|max:20',
            'beneficiario.dataNascimento' => 'required|date', // ou date_format:d-m-Y se quiser forçar formato
            'documentos' => 'required|array|min:1|max:3',
            'documentos.*.tipoDocumento' => 'required|in:RG,CPF,CNH,Passaporte,Outros',
            'documentos.*.descricao' => 'required|string|max:255|unique:documentos,descricao',
        ];
    }
}
