<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home', [HomeController::class, 'store'])->name('store');
Route::post('/getBookingDates', [HomeController::class, 'getBookingDates'])->name('getBookingDates');
Route::post('/store', [HomeController::class, 'store'])->name('storeBooking');


Route::get('forgot-password', [LoginController::class, 'forgotPassword'])->name('ForgotPassword');
Route::post('forgot-password', [LoginController::class, 'ForgetPasswordPost'])->name('ForgetPasswordPost');
Route::get('/reset-password/{token}', [LoginController::class, 'ResetPassword'])->name('ResetPasswordGet');
Route::post('reset-password', [LoginController::class, 'ResetPasswordStore'])->name('ResetPasswordPost');

// Route::any('login', [LoginController::class, 'login'])->middleware('admin')->name('admin.login');
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('admin.login');
Route::post('/login', [LoginController::class, 'login'])->name('admin.loginPost');

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('/admin/booking/list/{name?}', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/admin/booking/edit/{id?}', [BookingController::class, 'edit'])->name('booking.edit');
    Route::post('/getBookings/{name?}', [BookingController::class, 'getBookings'])->name('admin.getBookings');
    Route::post('/admin/booking/update', [BookingController::class, 'update'])->name('booking.update');
    Route::post('/admin/bookingDatesUpdate', [BookingController::class, 'bookingDatesUpdate'])->name('booking.dates.update');
    Route::post('/admin/booking/delete', [BookingController::class, 'delete'])->name('booking.delete');

});
