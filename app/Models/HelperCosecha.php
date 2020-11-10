<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class HelperCosecha
{
    public static function tabla_temporal_data_cintas($hacienda)
    {
        $hacienda = $hacienda == 1 ? 'primo' : 'sofca';
        $sql = "create table cosecha_cintas_" . $hacienda . "
                    (
                        [cs_id] [numeric](5, 0) identity not null PRIMARY KEY,
                        [cs_haciend] [numeric](2, 0) NOT NULL,
                        [cs_fecha] [date] NOT NULL,
                        [cs_convoy] [numeric](4, 0) NOT NULL,
                        [cs_n] [numeric](4, 0) NOT NULL,
                        [cs_avance] [numeric](4, 0) NOT NULL,
                        [cs_hora] [numeric](4, 0) NOT NULL,
                        [cs_tipo] [char](1) NOT NULL,
                        [cs_seccion] [char](3) NOT NULL,
                        [cs_garru] [numeric](3, 0) NOT NULL,
                        [cs_color] [numeric](5, 0) NOT NULL,
                        [cs_peso] [numeric](6, 2) NOT NULL,
                        [cs_dano] [numeric](2, 0) NOT NULL,
                        [cs_nivdano] [numeric](1, 0) NOT NULL,
                        [fechacre] [datetime] NULL,
                        [equipocre] [varchar](200) NULL
                    )";
        DB::connection('SISBAN')->unprepared(DB::raw($sql));
    }

    public static function tabla_temporal_data_cintas_drop($hacienda)
    {
        $hacienda = $hacienda == 1 ? 'primo' : 'sofca';
        $sql = "IF OBJECT_ID('dbo.cosecha_cintas_" . $hacienda . "', 'U') IS NOT NULL DROP TABLE dbo.cosecha_cintas_" . $hacienda;
        DB::connection('SISBAN')->unprepared(DB::raw($sql));
        //DB::connection('SISBAN')->unprepared(DB::raw("DROP TABLE IF EXISTS cosecha_cintas"));
    }
}
