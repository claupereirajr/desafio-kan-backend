<?php

namespace App\Models;

use App\Enums\EnumTipoDocumentos;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';
    protected $fillable = [
        'beneficiario_id',
        'tipoDocumento',
        'descricao',
    ];
    protected function cast(): array
    {
        return [
            'tipoDocumento' => EnumTipoDocumentos::getKeys()
        ];
    }
}
