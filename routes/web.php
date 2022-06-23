<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::controller(App\Http\Controllers\StudentController::class)->group(function () {
//     Route::get('/add-student', 'create');
//     Route::post('/add-student', 'store');
// });

Route::get('/list', [StudentController::class, 'index']);
Route::get('/add-student',[StudentController::class, 'create']);
Route::post('/add-student',[StudentController::class, 'store'])->name('add-student');
Route::get('/student-edit/{id}',[StudentController::class, 'edit']);
Route::put('/student-update/{id}',[StudentController::class, 'update']);
Route::get('/student-delete/{id}',[StudentController::class, 'delete']);
