<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


Route::get('/trangchu', [PageController::class, 'index']);
Route::get('/sanpham', [PageController::class, 'getSp']);
Route::get('/chitiet/{id}', [PageController::class, 'getchitiet']);
Route::get('/lienhe', [PageController::class, 'getlienhe']);
Route::get('/gioithieu', [PageController::class, 'getabout']);


 