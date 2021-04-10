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
use App\Http\Controllers\ModuleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return [0,1,3];
});
Route::get('/cp', function() {
    return view('niveaucp');
});
Route::get('/cycle', function() {
    return view('niveaucycle');
});
//Route::get('/Modules',[ModuleController::class,'Modules']);
Route::get('/createModule',[ModuleController::class,'Create']);
Route::get('/prof',[ProfController::class, 'Index']);
Route::post('/Modules',[ModuleController::class, 'Store']);
Route::get('/Modules',[ModuleController::class, 'Index']);
Route::get('/home', function () {
    return view('home');
});
Route::POST('/getAllProfs',[ModuleController::class, 'getAllProfs']);
Route::get('/getAllProfs',[ModuleController::class, 'getAllProfs2']);
//get
//post
//store
Route::get('/listeProf',[ProfController::class, 'liste']);
Route::get('/createProf',[ProfController::class, 'Index']);
Route::post('/createProf',[ProfController::class, 'Store']);
Route::get('/home', function () {
    return view('home');
});
