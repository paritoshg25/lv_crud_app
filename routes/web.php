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
        return view('welcome'); // Route for welcome
    });
    require __DIR__.'/auth.php';

    Route::group(['middleware' => 'auth'], function(){

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard'); // Route to Dashboard

        // Route::controller(App\Http\Controllers\StudentController::class)->group(function () {
        //     Route::get('/add-student', 'create');
        //     Route::post('/add-student', 'store');
        // });

        Route::get('/student-list', [StudentController::class, 'index'])->name('student-list'); //Route for show student details

        Route::get('/student-form',[StudentController::class, 'createStudent'])->name('form-create'); //Route for add student details
        Route::post('/student-form',[StudentController::class, 'storeStudent'])->name('form-store'); //Route for store student details
        Route::get('/student-form/{id}',[StudentController::class, 'editStudent'])->name('form-edit'); //Route for edit student details
        Route::put('/student-form/{id}',[StudentController::class, 'updateStudent']); // Route for update student details

        Route::delete('/student-delete/{id}', [StudentController::class, 'deleteStudent'])->name('delete'); // Route for delete student
    
    }); //Middleware Auth END 

}); //Middleware prevent-back-history END 
