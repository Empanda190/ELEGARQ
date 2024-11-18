<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\elegarqcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('principalel',[elegarqcontroller::class,'principalel'])->name('principalel');






