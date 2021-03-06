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
use App\Http\Controllers\CalandrierController;
use App\Http\Controllers\EmpController;


Route::post('/downloadPDFExams',[CalandrierController::class, 'downloadPDFex']);
//Route::get('/downloadPDFExams',[CalandrierController::class, 'downloadPDFex']);

Route::get('/sendMail',[ProfController::class, 'sendMail']);


Route::post('/ExamenTable',[CalandrierController::class, 'walotraitemant']);
Route::get('/ExamenTable',[CalandrierController::class, 'walotraitemant2']);

Route::get('/pdf',[EmpController::class, 'getDataToPDF']);
Route::post('/pdfTable',[EmpController::class, 'generateData']);
Route::get('/pdfTable',[EmpController::class, 'generateData2']);
Route::get('/downloadPDF',[EmpController::class, 'downloadPDF']);



Route::post('/localServ',[CalandrierController::class, 'walotraitemant3']);


Route::post('/login',[FiliereController::class, 'login']);
Route::get('/login',[FiliereController::class, 'log']);

Route::post('/Calandrier',[CalandrierController::class, 'getExams']);
Route::get('/Calandrier',[CalandrierController::class, 'Calandrier']);

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



Route::get('/listerFiliere',[FiliereController::class, 'liste']);
Route::get('/createFiliere',[FiliereController::class, 'Index']);
Route::post('/createFiliere',[FiliereController::class, 'Store']);



Route::get('/detailFiliere/{id}',[FiliereController::class, 'detail']);


Route::get('/ModifierFiliere/{id}',[FiliereController::class, 'modifetget']);
Route::post('/ModifierFiliere',[FiliereController::class, 'modifetpost']);

Route::get('/home', function () {
    return view('home');
});
Route::POST('/getAllProfs',[ModuleController::class, 'getAllProfs']);
Route::POST('/getAllProfs2',[ModuleController::class, 'getAllProfs2']);
Route::get('/getAllProfs',[ModuleController::class, 'getAllProfs2']);
Route::get('/getAllProfs2',[ModuleController::class, 'getAllProfs3']);

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


//locals
Route::post('/getLocals',[ModuleController::class, 'getLocals']);
Route::get('/getLocals',[ModuleController::class, 'getLocals2']);

Route::post('/saveSalle',[ModuleController::class, 'saveSalle']);
Route::get('/saveSalle',[ModuleController::class, 'saveSalle2']);
//Route::POST('/getLocals',[ModuleController::class, 'getLocals']);
