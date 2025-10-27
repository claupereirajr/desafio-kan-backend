<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBeneficiarioRequest;
use App\Http\Requests\UpdateBeneficiarioRequest;
use App\Models\Beneficiario;
use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{
    /**
     * API para obter todos os beneficiarios
     * with pagination and order by and limit request param
     */
    public function index(Request $request)
    {
        $order = $request->query('order', 'asc');
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 10);

        $beneficiarios = Beneficiario::orderBy('id', $order)->paginate($limit, ['*'], 'page', $page);
        return response()->json($beneficiarios);
    }

    /**
     * Store a newly created resource in storage.
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
     */
    public function store(StoreBeneficiarioRequest $request)
    {

        $data = $request->validated();
        $dataBeneficiario = [
            'nome' => $data['beneficiario']['nome'],
            'telefone' => $data['beneficiario']['telefone'],
            'dataNascimento' => $data['beneficiario']['dataNascimento'],
        ];
        $beneficiario = Beneficiario::create($dataBeneficiario);
        if (!$beneficiario) {
            return response()->json(['error' => 'Erro ao criar beneficiario'], 500);
        }
        foreach ($data['documentos'] as $documento) {
            $documento['beneficiario_id'] = $beneficiario->id;
            $beneficiario->documentos()->create($documento);
        }
        return response()->json($beneficiario, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Beneficiario $beneficiario)
    {
        $beneficiario->load('documentos');
        return response()->json($beneficiario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBeneficiarioRequest $request, Beneficiario $beneficiario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beneficiario $beneficiario)
    {
        $beneficiario->delete();
        return response()->json(['message' => 'Beneficiario deletado com sucesso'], 200);
    }
}
