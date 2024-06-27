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

// Show admin resturents tags page
Route::get('/admin/resturents_tags', [AdminController::class, 'resturentsTagsIndex']);

// Store admin resturents tag in database
Route::post('/admin/resturentTagStore', [AdminController::class, 'resturentsTagsStore']);

// Delete admin resturents tag
Route::delete('/admin/resturents_tags/{resturentTag}', [AdminController::class, 'deleteResTag']);

// Show admin food tags page
Route::get('/admin/food_tags', [AdminController::class, 'foodTagsIndex']);

// Store admin food tag in database
Route::post('/admin/foodTagStore', [AdminController::class, 'foodTagsStore']);

// Delete admin food tag
Route::delete('/admin/food_tags/{foodTag}', [AdminController::class, 'deleteFoodTag']);

