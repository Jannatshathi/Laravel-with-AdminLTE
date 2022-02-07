<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//students
//Route::get('/student/{key}',[StudentsController::class, 'index']);
Route::get('/student/create',[StudentsController::class, 'create'])->name('student.create');
Route::get('/student/list',[StudentsController::class, 'list'])->name('student.list');
Route::post('/student/store',[StudentsController::class, 'store'])->name('student.store');
Route::get('/student/edit/{id}',[StudentsController::class,'edit'])->name('student.edit');
Route::put('/student/update/{id}',[StudentsController::class,'update'])->name('student.update');
Route::get('/student/delete/{id}',[StudentsController::class,'delete'])->name('student.delete');
