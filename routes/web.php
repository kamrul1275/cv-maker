<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\auth\LoginController;
use App\Http\Controllers\backend\auth\LogoutController;
use App\Http\Controllers\backend\auth\RegisterController;
use App\Http\Controllers\backend\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login',[LoginController::class,'showLoginForm'])->name('show.login');
Route::post('/login',[LoginController::class,'login'])->name('login');




Route::get('/register',[RegisterController::class,'showRegister'])->name('show.register');
Route::post('/register',[RegisterController::class,'register'])->name('register');

Route::middleware('user')->group(function(){

    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
    Route::get('/logout',[HomeController::class,'Logout'])->name('logout');



});



Route::middleware('admin')->group(function(){

    Route::get('/admin/dashboard',[AdminController::class,'Admindashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'adminLogout'])->name('admin.logout');




});








Route::get("/create/category",[CategoryController::class,'createCategory'])->name('add.category');

Route::get("/all/category",[CategoryController::class,'allCategory'])->name('all.category');

Route::post("/store/category",[CategoryController::class,'storeCategory'])->name('store.category');

