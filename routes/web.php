<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SellerHomeController;
use App\Models\Seller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


//  Show admin dashbord page
Route::get('/admin', [AdminController::class, 'index'])->middleware('adminAuth');

// Show admin login form
Route::get('/admin/login', [AdminController::class, 'login'])->middleware('guest');

// authtenticate admin
Route::post('/admin/auth', [AdminController::class, 'auth'])->middleware('guest');

// Log out admin
Route::post('/admin/logout', [AdminController::class, 'logout'])->middleware('adminAuth');

// Show admin edit username & password form
Route::get('/admin/change_password', [AdminController::class, 'edit'])->middleware('adminAuth');

// Update admin username & password
Route::put('/admin/update', [AdminController::class, 'update'])->middleware('adminAuth');

// Show admin resturents tags page
Route::get('/admin/resturents_tags', [AdminController::class, 'resturentsTagsIndex'])->middleware('adminAuth');

// Store admin resturents tag in database
Route::post('/admin/resturentTagStore', [AdminController::class, 'resturentsTagsStore'])->middleware('adminAuth');

// Delete admin resturents tag
Route::delete('/admin/resturents_tags/{resturentTag}', [AdminController::class, 'deleteResTag'])->middleware('adminAuth');

// Show admin food tags page
Route::get('/admin/food_tags', [AdminController::class, 'foodTagsIndex'])->middleware('adminAuth');

// Store admin food tag in database
Route::post('/admin/foodTagStore', [AdminController::class, 'foodTagsStore'])->middleware('adminAuth');

// Delete admin food tag
Route::delete('/admin/food_tags/{foodTag}', [AdminController::class, 'deleteFoodTag'])->middleware('adminAuth');

// Show admin delete comments page
Route::get('/admin/comments_delete', [AdminController::class, 'commentsDelIndex'])->middleware('adminAuth');

// Keep comment 
Route::post('/admin/comment_keep/{comment}', [AdminController::class, 'keepComment'])->middleware('adminAuth');

// Delete comment as seller requested
Route::delete('/admin/comment_deleteing/{comment}', [AdminController::class, 'deleteComment'])->middleware('adminAuth');


// Sellers routes
Route::prefix('seller')->group(function() {
    Route::get('/register', [SellerController::class, 'create']);  // Show seller register form
    Route::post('/store', [SellerController::class, 'store']);  // Create seller 
    Route::get('/dashbord', [SellerHomeController::class, 'index'])->middleware('completeResturentInfo');  // Show seller dashbord page
    Route::get('/complete_res_info', [SellerController::class, 'createResturentInfo']); // Show complete resturent info form
});

