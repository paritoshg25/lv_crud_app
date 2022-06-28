<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentResourceController;

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
            
        Route::resource('students', StudentResourceController::class);
        
    }); //Middleware Auth END 

}); //Middleware prevent-back-history END 
