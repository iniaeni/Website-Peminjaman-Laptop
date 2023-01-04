<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;

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
Route::middleware('isGuest')->group(function(){
    Route::get('/', [PeminjamanController::class, 'login'])->name('login');
    Route::get('/register', [PeminjamanController::class, 'register'])->name('register');
    Route::post('/login', [PeminjamanController::class, 'auth'])->name('login.auth');
    Route::post('/register', [PeminjamanController::class, 'registerAccount'])->name('register.createAccount');
});


Route::get('/logout', [PeminjamanController::class, 'logout'])->name('logout');



Route::middleware('isLogin')->prefix('/laptop')->name('laptop.')->group(function(){
    Route::get('/', [PeminjamanController::class, 'index'])->name('index');
    // Route::get('/index', [PeminjamanController::class, 'index'])->name('index');
    Route::get('/create', [PeminjamanController::class, 'create'])->name('create');
    Route::post('/store', [PeminjamanController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [PeminjamanController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [PeminjamanController::class, 'update'])->name('update');
    Route::get('/complated', [PeminjamanController::class, 'complated'])->name('complated');
    Route::patch('/complated/{id}', [PeminjamanController::class, 'updateComplated'])->name('update-complated');
    Route::delete('/delete/{id}', [PeminjamanController::class, 'destroy'])->name('delete');
});
