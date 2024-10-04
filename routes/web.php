<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('index');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginuser', [LoginController::class, 'loginuser'])->name('loginuser');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

Route::group(['middleware' => ['auth']], function () {
    Route::get('home', [StudentController::class, 'index']);
    Route::post('students', [StudentController::class, 'store']);
    Route::get('fetch-students', [StudentController::class, 'fetchstudent']);
    Route::get('edit-student/{id}', [StudentController::class, 'edit']);
    Route::post('update-student/{id}', [StudentController::class, 'update']);
    Route::delete('delete-student/{id}', [StudentController::class, 'destroy']);
});

Route::view('users', 'users');
Route::view('about', 'about');
