<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\PageController::class, 'index']);
//Route::get('/', [App\Http\Controllers\PageController::class, 'getSp']);
// Route::get('/', [App\Http\Controllers\PageController::class, 'getchitiet']);
// Route::get('/', [App\Http\Controllers\PageController::class, 'getlienhe']);
Route::get('add-to-cart/{id}',['as'=>'themgiohang','uses'=>'PageController@getAddtoCart']);
Route::get('del-cart/{id}',['as'=>'xoagiohang','uses'=>'PageController@getDelItemCart']);

