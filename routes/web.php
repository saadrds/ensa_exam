<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\ProfController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return [0,1,3];
});
Route::get('/prof',[ProfController::class, 'Index']);
Route::post('/prof',[ProfController::class, 'Store']);
Route::get('/home', function () {
    return view('home');
});
//get
//post
//store