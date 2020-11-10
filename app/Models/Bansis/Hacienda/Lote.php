<?php

namespace App\Models\Bansis\Hacienda;

use App\Models\BaseModel;

class Lote extends BaseModel
{
    protected $table = 'HAC_LOTES';

    public function hacienda()
    {
        return $this->hasOne(Hacienda::class, 'id', 'idhacienda');
    }

    public function secciones()
    {
        return $this->hasMany(LoteSeccion::class, 'idlote', 'id');
    }
}
