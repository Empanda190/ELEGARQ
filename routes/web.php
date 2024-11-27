<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\elegarqcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('principalel',[elegarqcontroller::class,'principalel'])->name('principalel');
Route::get('index',[elegarqcontroller::class,'index'])->name('index');
Route::get('login',[elegarqcontroller::class,'login'])->name('login');
Route::get('registrar_proyecto',[elegarqcontroller::class,'registrar_proyecto'])->name('registrar_proyecto');
Route::get('elaborar_cronograma',[elegarqcontroller::class,'elaborar_cronograma'])->name('elaborar_cronograma');
Route::get('seguir_proyecto',[elegarqcontroller::class,'seguir_proyecto'])->name('seguir_proyecto');
Route::post('saveregisproy',[elegarqcontroller::class,'saveregisproy'])->name('saveregisproy');
Route::post('savecrono',[elegarqcontroller::class,'savecrono'])->name('savecrono');

//Rutas del Catalogo de Materiales
Route::get('registro_mats', [elegarqcontroller::class, 'registro_mats'])->name('registro_mats');
Route::post('guardar_material', [elegarqcontroller::class, 'guardar_material'])->name('guardar_material');