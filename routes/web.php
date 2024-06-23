<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Show admin login form
Route::get('/admin/login', [AdminController::class, 'login']);

//  Show admin dashbord page
Route::get('/admin', [AdminController::class, 'index']);

// authtenticate admin
Route::post('/admin/auth', [AdminController::class, 'auth']);

// Log out admin
Route::post('/admin/logout', [AdminController::class, 'logout']);

// Show admin edit username & password form
Route::get('/admin/change_password', [AdminController::class, 'edit']);

// Update admin username & password
Route::put('/admin/update', [AdminController::class, 'update']);

