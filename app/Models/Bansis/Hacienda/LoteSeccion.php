<?php

namespace App\Models\Bansis\Hacienda;

use App\Models\BaseModel;

class LoteSeccion extends BaseModel
{
    protected $table = 'HAC_LOTES_SECCION';

    public function lote()
    {
        return $this->hasOne(Lote::class, 'id', 'idlote');
    }

}
