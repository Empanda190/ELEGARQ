<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\elegarqcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('principal',[elegarqcontroller::class,'principal'])->name('principal');
Route::get('index',[elegarqcontroller::class,'index'])->name('index');
Route::get('login',[elegarqcontroller::class,'login'])->name('login');


/*Título: Proyecto despacho de arquitectos
    Autor: Berenice Morales Bustamante  Grupo: 7A
    Fecha de creación: 21 de noviembre del 2024 - 22:48 - 02:04
    Última actualización: 29 de noviembre del 2024 - 19:26 - 01:23*/

//Rutas del Catalogo de Materiales
Route::get('registro_mats', [elegarqcontroller::class, 'registro_mats'])->name('registro_mats');
Route::post('guardar_material', [elegarqcontroller::class, 'guardar_material'])->name('guardar_material');
Route::get('catalogo_mat', [elegarqcontroller::class, 'catalogo_mat'])->name('catalogo_mat');
Route::delete('/catalogo/{id}', [elegarqcontroller::class, 'destroy'])->name('eliminar_material');
Route::get('editarmaterial/{idcmt}',[elegarqcontroller::class,'editarmaterial'])->name('editarmaterial');
Route::put('/materiales/{idcmt}', [elegarqcontroller::class, 'update'])->name('actualizar_material');

//Rutas de la Asignación de Materiales



