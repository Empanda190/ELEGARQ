<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\elegarqcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('principalel',[elegarqcontroller::class,'principalel'])->name('principalel');
Route::get('index',[elegarqcontroller::class,'index'])->name('index');
Route::get('login',[elegarqcontroller::class,'login'])->name('login');





