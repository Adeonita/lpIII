<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
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

Route::get("/categories", [CategoryController::class, 'show']);
Route::get("/employees", [EmployeeController::class, 'show']);

Route::get("/", function () {
    return view('home/products');
});

Route::get("/cart", function () {
    return view('cart/cart');
});

Route::get("/createAccount", function () {
    return view('account/createAccount');
});

Route::get("/recover", function () {
    return view('recover/recover');
});

Route::get("/address-option", function () {
    return view('address-option/address-option');
});

Route::get("/purchasing-management", function () {
    return (view('employee/purchasingManagement'));
});

Route::get("/separate-purchasing", function () {
    return (view('employee/separatePurchase'));
});

Route::get("/evaluate-purchase", function () {
    return view('evaluate-purchase/index');
});

Route::get("/user-profile", function () {
    return view('user-profile/user-profile');
});

Route::get("/historic-page", function () {
    return view('historic-page/historic-page');
});

Route::get("/product", function () {
    return view('product/product');
});

Route::get("/trackingPage", function () {
    return view('tracking/trackingPage');
});


Route::get("/payment", function () {
    return view('/payment/payment');
});

Route::get("/packaging", function () {
    return view('/employee/packaging');
});

Route::get("/dashboard", function () {
    return view('/dashboard/index');
});

Route::get("/dashboard-purchases", function () {
    return view('/dashboard/purchases');
});

Route::get("/navigation", function () {
    return view('/employee/navigation');
});
