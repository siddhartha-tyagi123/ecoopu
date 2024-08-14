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
Route::get('customer/list',[AdminController::class, 'customerList'])->name('customer.list');
Route::get('edit/customer/{id}',[AdminController::class, 'editCustomer'])->name('edit.customer');
Route::post('update/customer/{id}',[AdminController::class, 'updateCustomer'])->name('update.customer');
Route::delete('delete/customer/{id}', [AdminController::class, 'destroyCustomer'])->name('destroy.customer');

Route::get('manager/list',[AdminController::class, 'managerList'])->name('manager.list');
Route::get('edit/manager/{id}',[AdminController::class, 'editManager'])->name('edit.manager');
Route::post('update/manager/{id}',[AdminController::class, 'updateManager'])->name('update.manager');
Route::delete('delete/manager/{id}', [AdminController::class, 'destroyManager'])->name('destroy.manager');

Route::get('shop/owner/list',[AdminController::class, 'shopOwnerList'])->name('shop.owner.list');
Route::get('edit/shop/owner/{id}',[AdminController::class, 'editShopOwner'])->name('edit.shop.owner');
Route::post('update/shop/owner/{id}',[AdminController::class, 'updateShopOwner'])->name('update.shop.owner');
Route::delete('delete/shop/owner/{id}', [AdminController::class, 'destroyShopOwner'])->name('destroy.shop.owner');



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




