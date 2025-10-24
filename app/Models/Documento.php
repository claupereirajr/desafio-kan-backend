<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';
    protected $fillable = [
        'id',
        'tipoDocumento',
        'descricao',
    ];

    public function beneficiarios()
    {
        return $this->belongsTo(Beneficiario::class, 'documento_id');
    }
}
