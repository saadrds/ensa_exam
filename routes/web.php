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
use App\Http\Controllers\FiliereController;


//login
Route::post('/login',[FiliereController::class, 'login']);
Route::get('/login',[FiliereController::class, 'log']);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::post('/welcome', function () {
    session()->forget("username");
    session()->forget("password");
    session()->flush();
    return view('welcome');
});

//ajax
Route::get('/hello', function () {
    return [0,1,3];
});
Route::get('/cp', function() {
    return view('niveaucp');
});
Route::get('/cycle', function() {
    return view('niveaucycle');
});

Route::post('/exams',[ModuleController::class, 'Exams']);
//Route::get('/exams',[ModuleController::class, 'Exams2']);
Route::post('/saveExam',[ModuleController::class, 'saveExam']);
Route::get('/saveExam',[ModuleController::class, 'saveExam2']);
Route::get('/examsScript',function () {
    return view('examScript');
});



//Route::get('/Modules',[ModuleController::class,'Modules']);
//modules
Route::get('/createModule',[ModuleController::class,'Create']);
Route::get('/prof',[ProfController::class, 'Index']);
Route::get('/Modules',[ModuleController::class, 'Index']);
Route::post('/Modules',[ModuleController::class, 'Store']);
Route::get('/Modules/{id}',[ModuleController::class, 'ModuleSelected']);


//Route::post('/Filiere',[FiliereController::class, 'Store']);
//filiere
Route::get('/listerFiliere',[FiliereController::class, 'liste']);
Route::get('/createFiliere',[FiliereController::class, 'Index']);
Route::post('/createFiliere',[FiliereController::class, 'Store']);


Route::get('/home', function () {
    return view('home');
});
Route::POST('/getAllProfs',[ModuleController::class, 'getAllProfs']);
Route::get('/getAllProfs',[ModuleController::class, 'getAllProfs2']);

Route::POST('/allModules',[ModuleController::class, 'allModules']);
Route::get('/allModules',[ModuleController::class, 'allModules2']);
//get
//post
//store

//PROF
Route::get('/listeProf',[ProfController::class, 'liste']);
Route::get('/createProf',[ProfController::class, 'Index']);
Route::post('/createProf',[ProfController::class, 'Store']);
Route::get('/home', function () {
    return view('home');
});
