<?php

use \Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api/sisban-app/index.php/cosecha')->group(function () {
    Route::get('primo/balanza', 'CosechaController@executeEventBalanzaPrimo');
    Route::get('sofca/balanza', 'CosechaController@executeEventBalanzaSofca');
});
