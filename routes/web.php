





<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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


Route::get('/login', [App\Http\Controllers\CustomerAuthController::class, 'showLoginForm'])->name('login');
Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index2'])->name('products.index');
Route::get('/products-details/{id}', [App\Http\Controllers\ProductController::class, 'productDetails'])->name('products.details');
Route::get('/testimonial', [App\Http\Controllers\testmonialcontroller::class, 'index'])->name('testimonial.index');
Route::post('/testimonials', [App\Http\Controllers\testmonialcontroller::class, 'store'])->name('testimonial.store');
Route::get('/contact', [App\Http\Controllers\contactcontroller::class, 'index'])->name('contact.index');
Route::post('/inquiries', [App\Http\Controllers\InquiryController::class, 'store'])->name('inquiries.store');
Route::get('/dashboard', [App\Http\Controllers\Dashboard\HomeController::class, 'index'])->name('dashboard.home');
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [App\Http\Controllers\cartcontroller::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [App\Http\Controllers\cartcontroller::class, 'add'])->name('cart.add');
    Route::put('/cart/update/{cartItem}', [App\Http\Controllers\cartcontroller::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{cartItem}', [App\Http\Controllers\cartcontroller::class, 'remove'])->name('cart.remove');
    Route::get('/checkout', [App\Http\Controllers\checkoutcontroller::class, 'show'])->name('checkout.index');
    Route::post('/checkout', [App\Http\Controllers\checkoutcontroller::class, 'store'])->name('checkout.store');
    Route::get('/my-orders', [App\Http\Controllers\CustomerOrderController::class, 'index'])->name('customer.orders');
    Route::get('/balance/charge', [App\Http\Controllers\Dashboard\UserBalanceController::class, 'charge'])->name('balance.charge');
    Route::post('/balance/charge', [App\Http\Controllers\BalanceChargeController::class, 'store'])->name('balance.charge.store');
});


Route::middleware(['auth', 'role:admin,salesman'])->prefix('dashboard')->group(function () {
    Route::get('/balance/topup-requests', [App\Http\Controllers\Dashboard\BalanceTopupRequestController::class, 'index'])->name('dashboard.balance.topup-requests');
    Route::put('/balance/topup-requests/{id}', [App\Http\Controllers\Dashboard\BalanceTopupRequestController::class, 'updateStatus'])->name('dashboard.balance.topup-requests.update');
    Route::get('/', [App\Http\Controllers\Dashboard\productcontroller::class, 'index'])->name('products.list');
    Route::get('/addproduct', [App\Http\Controllers\Dashboard\productcontroller::class, 'create'])->name('products.add');
    Route::post('/storeproduct', [App\Http\Controllers\Dashboard\productcontroller::class, 'store'])->name('products.store');
    Route::get('/editproduct/{id}', [App\Http\Controllers\Dashboard\productcontroller::class, 'edit'])->name('products.edit');
    Route::put('/updateproduct/{id}', [App\Http\Controllers\Dashboard\productcontroller::class, 'update'])->name('products.update');
    Route::delete('/deleteproduct/{id}', [App\Http\Controllers\Dashboard\productcontroller::class, 'delete'])->name('products.delete');
    Route::get('/categories', [App\Http\Controllers\Dashboard\categorycontroller::class, 'index'])->name('categories.list');
    Route::get('/addcategory', [App\Http\Controllers\Dashboard\categorycontroller::class, 'create'])->name('categories.add');
    Route::post('/storecategory', [App\Http\Controllers\Dashboard\categorycontroller::class, 'store'])->name('categories.store');
    Route::get('/editcategory/{id}', [App\Http\Controllers\Dashboard\categorycontroller::class, 'edit'])->name('categories.edit');
    Route::put('/updatecategory/{id}', [App\Http\Controllers\Dashboard\categorycontroller::class, 'update'])->name('categories.update');
    Route::delete('/deletecategory/{id}', [App\Http\Controllers\Dashboard\categorycontroller::class, 'delete'])->name('categories.delete');
     Route::get('/orders', [App\Http\Controllers\CustomerOrderController::class, 'list'])->name('customer.orderslist');
    Route::get('/testimonialslist', [App\Http\Controllers\Dashboard\testimonialcontroller::class, 'index'])->name('testimonials.list');
    Route::delete('/deletetestimonial/{id}', [App\Http\Controllers\Dashboard\testimonialcontroller::class, 'delete'])->name('testimonials.delete');
    Route::get('/stats', [App\Http\Controllers\Dashboard\statcontroller::class, 'index'])->name('dashboard.stats');
      Route::get('/balance', [App\Http\Controllers\Dashboard\UserBalanceController::class, 'index'])->name('dashboard.users.balance');
    
});

Route::post('/logout',[AuthController::class,'logout'])->name('logout.view')->middleware('auth');
Route::post('/login', [App\Http\Controllers\CustomerAuthController::class, 'login'])->name('customer.login.submit');
Route::post('/logout', [App\Http\Controllers\CustomerAuthController::class, 'logout'])->name('customer.logout');
Route::get('/register', [App\Http\Controllers\CustomerAuthController::class, 'showRegistrationForm'])->name('customer.register');
Route::post('/register', [App\Http\Controllers\CustomerAuthController::class, 'register'])->name('register.submit');

Route::middleware(['auth', 'role:admin'])->prefix('dashboard')->group(function () {
    Route::get('/inquiries', [App\Http\Controllers\Dashboard\InquiryDashboardController::class, 'index'])->name('dashboard.inquiries');
    Route::post('/read/{id}', [App\Http\Controllers\Dashboard\InquiryDashboardController::class, 'markAsRead'])->name('dashboard.inquiries.read');
    Route::put('/balance/{id}', [App\Http\Controllers\Dashboard\UserBalanceController::class, 'update'])->name('dashboard.users.balance.update');
    Route::put('/users/{id}/role', [\App\Http\Controllers\Dashboard\UserController::class, 'updateRole'])->name('dashboard.users.role.update');

});