<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    protected $table = 'beneficiarios';
    protected $fillable = [
        'nome',
        'telefone',
        'dataNascimento',
    ];
    public function documentos()
    {
        return $this->hasMany(Documento::class, 'beneficiario_id');
    }
}
