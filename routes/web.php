<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SellerHomeController;
use App\Http\Controllers\UserController;
use App\Models\Seller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


//  Show admin dashbord page
Route::get('/admin', [AdminController::class, 'index'])->middleware('adminAuth');

// Show admin login form
Route::get('/admin/login', [AdminController::class, 'login'])->middleware('guard-guests');

// authtenticate admin
Route::post('/admin/auth', [AdminController::class, 'auth'])->middleware('guard-guests');

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
    Route::get('/register', [SellerController::class, 'create'])->middleware('guard-guests'); // Show seller register form
    Route::post('/store', [SellerController::class, 'store'])->middleware('guard-guests');  // Create seller 
    Route::get('/dashbord', [SellerHomeController::class, 'index'])->middleware('sellerAuth')->middleware('completeResturentInfo'); // Show seller dashbord page
    Route::get('/complete_res_info', [SellerController::class, 'createResturentInfo'])->middleware('sellerAuth'); // Show complete resturent info form
    Route::put('/complete_res_info', [SellerController::class, 'storeResturentInfo'])->middleware('sellerAuth'); // Store resturent info
    Route::get('/login', [SellerController::class, 'login'])->middleware('guard-guests'); // Show seller login page
    Route::post('/auth', [SellerController::class, 'auth'])->middleware('guard-guests'); // Login seller
    Route::post('/logout', [SellerController::class, 'logout'])->middleware('sellerAuth'); // Logout seller
});

// Sellers dashbord
Route::group(['middleware' => ['sellerAuth'], 'prefix' => 'seller/dashbord'], function() {
    Route::get('/resturent_setting', [SellerHomeController::class, 'resturentSetting']); // Show resturent setting page
    Route::put('/resturent_setting', [SellerHomeController::class, 'updateResturentSetting']); // Update resturent setting
    Route::put('/resturent_status', [SellerHomeController::class, 'updateResturentStatus']); // Update resturent status
    Route::get('/foods', [SellerHomeController::class, 'foods']); // Show foods page
    Route::post('/foods', [SellerHomeController::class, 'foodsStore']); // Create Food
    Route::put('/foods/food_party/{food}', [SellerHomeController::class, 'foodsFoodParty']); // Add or remove food from food party
    Route::get('/foods/edit/{food}', [SellerHomeController::class, 'foodsEdit']); // Show edit food form
    Route::put('/foods/update/{food}', [SellerHomeController::class, 'foodsUpdate']); // Update food
    Route::put('/foods/discount/{food}', [SellerHomeController::class, 'foodsRemoveDiscount']); // Remove food's discount
    Route::delete('/foods/delete/{food}', [SellerHomeController::class, 'foodsDestroy']); // Delete food from database
    Route::put('/order_status/{order}', [SellerHomeController::class, 'orderStatusUpdate']); // Update order status
    Route::get('/order_archive', [SellerHomeController::class, 'orderArchive']); // Show order archive page
    Route::get('/sell_report', [SellerHomeController::class, 'sellReport']); // Show sell report page
    Route::get('/comments', [SellerHomeController::class, 'comments']); // Show comments page
    Route::put('/comments/{comment}', [SellerHomeController::class, 'commentsReply']); // Update comment reply
    Route::post('/comments/{comment}', [SellerHomeController::class, 'commentsDelReq']); // Request to admin for deleting comment
});


// Home public routes
Route::group(['middleware' => ['guest']], function() {
    Route::get('/', [HomeController::class, 'index']); // Index page
    Route::get('/login', [UserController::class, 'login']); // Show user login form
    Route::get('/register', [UserController::class, 'register']); // Show user register form
    Route::post('/login/auth', [UserController::class, 'auth']); // Login user
    Route::post('/register', [UserController::class, 'store']); // Register user in database
});

// Home protected routes
Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [HomeController::class, 'home']); // Home page (after user login in website!)
    Route::get('/logout', [UserController::class, 'logout']); // Logout user
    Route::get('/food_order/{resturent}', [HomeController::class, 'foodOrder']); // Show resturent foods for order 
    Route::post('/food_order', [HomeController::class, 'foodOrderStore']); // Store order in database
    Route::get('/category/{resturent_tag}', [HomeController::class, 'categories']); // Show category page
    Route::get('/all_food_party', [HomeController::class, 'allFoodParty']); // Show all foods in food party
    Route::get('/user_setting', [UserController::class, 'userSetting']); // Show user setting page
    Route::put('/user_setting/update', [UserController::class, 'update']); // Update user info
    Route::put('/update_user_address', [HomeController::class, 'updateUserAddress']); // Update user address
    Route::get('/delete_user_address', [HomeController::class, 'deleteUserAddress']); // Delete user address
    Route::get('/order_detaile/{id}', [HomeController::class, 'orderDetaile']); // Show order detaile
    Route::get('/reorder/{id}', [HomeController::class, 'reOrder']); // Reorder the order that user selected
    Route::post('/create_comment/{order_id}', [HomeController::class, 'createComment']); // Create comment
    Route::post('/rate_resturent/{resturent_id}', [HomeController::class, 'rateResturent']); // Create rating for resturent
    Route::post('/search_resturents', [HomeController::class, 'searchResturent']); // Show resturent search page
});



