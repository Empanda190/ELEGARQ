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
Route::get('/get-cotizacion-details/{id}', [elegarqcontroller::class, 'getDetails']);
Route::post('savecrono',[elegarqcontroller::class,'savecrono'])->name('savecrono');



