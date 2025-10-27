<?php

namespace App\Enums;

enum EnumTipoDocumentos
{
    // ['RG', 'CPF', 'CNH', 'Passaporte', 'Outros']
    case RG;
    case CPF;
    case CNH;
    case PASSAPORTE;
    case OUTROS;

    public static function getValues(): array
    {
        return array_column(self::cases(), 'name');
    }
    public static function getValuesWithKeys(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
    public static function getKeys(): array
    {
        return array_column(self::cases(), 'value');
    }
    public static function getKeysWithValues(): array
    {
        return array_column(self::cases(), 'value', 'name');
    }
}
