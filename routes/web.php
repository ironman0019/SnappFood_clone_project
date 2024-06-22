<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin/login', [AdminController::class, 'login']);

Route::get('/admin', [AdminController::class, 'index']);

Route::post('/admin/auth', [AdminController::class, 'auth']);