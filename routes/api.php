<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\StudentsController;
use \App\Http\Controllers\ProfessorsController;
use \App\Http\Controllers\LecturesController;
use \App\Http\Controllers\SubjectsController;
use \App\Http\Controllers\LecturesStudentsController;
use \App\Http\Controllers\FileController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Students
Route::post('/students/add', [StudentsController::class, 'store']);
Route::post('/students/edit/{id}', [StudentsController::class, 'edit']);
Route::get('/students/edit/{id}', [StudentsController::class, 'edit1']);
Route::get('/students/get', [StudentsController::class, 'index']);
Route::get('/students/delete/{id}', [StudentsController::class, 'destroy']);

// Subjects
Route::post('/subjects/add', [SubjectsController::class, 'store']);
Route::post('/subjects/edit/{id}', [SubjectsController::class, 'edit']);
Route::get('/subjects/get', [SubjectsController::class, 'index']);
Route::get('/subjects/delete/{id}', [SubjectsController::class, 'destroy']);

// Professors
Route::post('/professors/add', [ProfessorsController::class, 'store']);
Route::post('/professors/edit/{id}', [ProfessorsController::class, 'edit']);
Route::get('/professors/edit/{id}', [ProfessorsController::class, 'edit1']);
Route::get('/professors/get', [ProfessorsController::class, 'index']);
Route::get('/professors/delete/{id}', [ProfessorsController::class, 'destroy']);

// Lectures
Route::post('/lectures/add', [LecturesController::class, 'store']);
Route::post('/lectures/edit/{id}', [LecturesController::class, 'edit']);
Route::get('/lectures/get', [LecturesController::class, 'index']);
Route::get('/lectures/delete/{id}', [LecturesController::class, 'destroy']);

// LectureStudent
Route::post('/ls/add', [LecturesStudentsController::class, 'store']);
Route::post('/ls/edit/{id}', [LecturesStudentsController::class, 'edit']);
Route::get('/ls/get', [LecturesStudentsController::class, 'index']);
Route::get('/ls/delete/{id}', [LecturesStudentsController::class, 'destroy']);
