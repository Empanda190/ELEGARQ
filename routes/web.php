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
Route::post('saveregisproy',[empleadoscontroller::class,'saveregisproy'])->name('saveregisproy');



