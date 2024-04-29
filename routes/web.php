<?php

use App\Http\Controllers\AppointController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MealplanController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PrescController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();
Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
});
Route::middleware('auth')->group(function(){
    Route::controller(HomeController::class)->group(function(){
        Route::get('/','index');
    });
    Route::resources([
        'users'=>UserController::class,
        'appointments'=>AppointController::class,
        'prescriptions'=>PrescController::class,
        'reminder'=>ReminderController::class,
        'user'=>UserController::class,
        'meals'=>MealplanController::class,
        'message'=>MessageController::class,
    ]);
});