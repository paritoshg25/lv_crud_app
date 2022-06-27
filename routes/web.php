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


Route::group(['middleware' => 'prevent-back-history'],function(){

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

Route::get('/list', [StudentController::class, 'index'])->middleware(['auth'])->name('list');

Route::get('/form',[StudentController::class, 'create_student'])->middleware(['auth'])->name('form');
Route::post('/form',[StudentController::class, 'store_student'])->name('form');
Route::get('/form/{id}',[StudentController::class, 'edit_student'])->middleware(['auth'])->name('form');
Route::put('/form/{id}',[StudentController::class, 'update_student']);

Route::delete('/student-delete/{id}', [StudentController::class, 'delete_student'])->middleware(['auth'])->name('delete');

});
