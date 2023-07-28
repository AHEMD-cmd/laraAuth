<?php

use App\Http\Controllers\Back\BackHomeController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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


Route::prefix('front')->name('front.')->group(function () {
    Route::get('/', FrontController::class)->middleware('auth')->name('index');

});

// BACK DESIGN
Route::prefix('back')->name('back.')->group(function () {
    Route::get('/', BackHomeController::class)->middleware('admin')->name('index');

    ##------------------------------------------------------- USERS MODULE
    // Route::controller(UserController::class)->group(function () {
    //     Route::resource('users', UserController::class);
    // });

    ##------------------------------------------------------- ROLES MODULE
    Route::controller(RoleController::class)->group(function () {
        Route::resource('roles', RoleController::class);
    });

    ##------------------------------------------------------- ADMINS MODULE
    // Route::controller(AdminController::class)->group(function () {
    //     Route::resource('admins', AdminController::class);
    // });

    require __DIR__ . '/adminAuth.php';
});






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('/', 'welcome');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
