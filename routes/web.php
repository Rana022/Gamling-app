<?php

use Illuminate\Support\Facades\Route;
//vue router


Route::get('/{vue}', function () {
    return view('welcome');
})->where('vue', '[\/\w\.-]*');

Route::view('/', 'welcome');

