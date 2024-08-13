<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterationController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ShopOwnerController;
use App\Http\Controllers\CustomerController;


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin routes
Route::get('/admin', [LoginController::class, 'index']);
Route::get('admin-login', [LoginController::class, 'index'])->name('admin.login');
Route::post('post-login', [LoginController::class, 'processLogin'])->name('login.post');
Route::get('/user-registeration', [RegisterationController::class, 'index'])->name('register');
// Route::post('post-registration', [RegisterationController::class, 'processRegisteration'])->name('register.post');
Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware('isAdmin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('add-user', [AdminController::class, 'showAddUserForm'])->name('admin.adduser');
// admin routes end
// front routes
Route::get('/', [UserController::class, 'index']);
Route::get('home', [UserController::class, 'index'])->name('home')->middleware('isUser');
Route::get('login', [LoginController::class ,'showUserLogin'])->name('login');
Route::post('post-register', [RegisterationController::class, 'userRegisteration'])->name('user.registeration');
Route::post('shop-register', [RegisterationController::class, 'shopOwnerRegisteration'])->name('owner.registeration');
// front routes end
// email routes
Route::get('/email/verify', function () {
    return view('front.auth.verify-email')->with('success','Link sent');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
// ends

// foreget password routes
Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot.password.get');
Route::post('forgot-password', [ForgotPasswordController::class, 'submitForgotPasswordForm'])->name('forgot.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

// In routes/web.php
// Route::post('/change-language', [LanguageController::class, 'changeLanguage'])->name('change.language');
// Route::middleware("auth")->group(function () {
Route::get('plans', [PlanController::class, 'index'])->name('plan.index');
Route::get('plans/{plan}', [PlanController::class, 'show'])->name("plans.show");
Route::post('subscription', [PlanController::class, 'subscription'])->name("subscription.create");
// });
//Shop owner
Route::get('shop/owner/dashboard', [ShopOwnerController::class, 'index'])->name('shop.owner.dashboard');
//Customer
Route::get('customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
Route::get('customer/orderlist', [CustomerController::class, 'orderList'])->name('orderlist');

// language translations
Route::get('lang/change', [UserController::class, 'change'])->name('changeLang');



