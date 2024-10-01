<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'home'])->name('home');

Route::post('/submit', [HomeController::class, 'dataStore'])->name('submit');


Route::get('/404', [HomeController::class, 'error']);

Route::get('/about', [HomeController::class, 'about']);

Route::get('/booking', [HomeController::class, 'booking']);

Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/service', [HomeController::class, 'service']);

Route::get('/team', [HomeController::class, 'team']);

Route::get('/testimonial', [HomeController::class, 'testimonial']);

Route::get('/service', [HomeController::class, 'service_show']);


// Backend route


Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard')->middleware('admin');

Route::get('/add-services', [ServiceController::class, 'add_service'])->name('add-services');

Route::post('/service.store', [ServiceController::class, 'serviceStore'])->name('service.store');

Route::get('/service.list', [ServiceController::class, 'show'])->name('service.list');

Route::get('/booking.list', [HomeController::class, 'bookinglist'])->name('bookingList');


//user route

Route::get('/login',[UserController::class,'login'])->name('login');

Route::get('/singup',[UserController::class,'singup'])->name('singup');

Route::post('/singupData',[UserController::class,'singupData'])->name('singupData');

Route::post('/loginCheck', [UserController::class, 'loginCheck'])->name('logincheck');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// mail controler

Route::get('/mail', [MailController::class, 'sent']);
