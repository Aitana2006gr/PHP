<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/productos', [ProductosController::class, "index"]);
Route::get('/productos/{cod_producto}/edit', [ProductosController::class, "edit"])->name("edicion");
