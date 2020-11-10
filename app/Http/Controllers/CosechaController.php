<?php

namespace App\Http\Controllers;

use App\Events\CosechaPrimo;
use App\Events\CosechaSofca;
use Illuminate\Support\Facades\DB;

class CosechaController extends Controller
{
    protected $out;

    public function __construct()
    {
        $this->out = $this->respuesta_json('error', 400, 'Detalle mensaje de respuesta');

    }


    public function executeEventBalanzaPrimo()
    {
        $cosecha = DB::connection('sisban')->table('cosecha_primo_temp')
            ->orderBy('cs_id', 'desc')
            ->take(1)
            ->lock('WITH(NOLOCK)')
            ->first();

        //Luego la aliminas
        event(new CosechaPrimo($cosecha));
    }

    public function executeEventBalanzaSofca()
    {
        $cosecha = DB::connection('sisban')->table('cosecha_sofca_temp')
            ->orderBy('cs_id', 'desc')
            ->take(1)
            ->lock('WITH(NOLOCK)')
            ->first();

        //Luego la aliminas
        event(new CosechaSofca($cosecha));
    }


    public function respuesta_json(...$datos)
    {
        return array(
            'status' => $datos[0],
            'code' => $datos[1],
            'message' => $datos[2]
        );
    }
}
