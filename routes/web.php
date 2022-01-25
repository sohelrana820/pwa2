<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;

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

/*
|--------------------------------------------------------------------------
| All available authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes([
    'register' => false, // Disable new registration
    'reset' => true, // Disable password reset
]);

Route::group(['middleware' => ['auth']], function () {
    // Available auth routes
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    /*
    |--------------------------------------------------------------------------
    | All available routes of projects
    |--------------------------------------------------------------------------
    */
    Route::prefix('projects')->group(function () {
        Route::name('projects.')->group(function () {
            /** Grid */
            Route::get('/', [ProjectController::class, 'index'])->name('grid');

            /** Add, Update */
            Route::get('/create/{id?}', [ProjectController::class, 'create'])->name('create');
            Route::post('/store', [ProjectController::class, 'store'])->name('store');
            Route::get('/update/{id}', [ProjectController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [ProjectController::class, 'update'])->name('update');
            Route::get('/view/{id}', [ProjectController::class, 'show'])->name('show');
            Route::delete('/delete/{id}', [ProjectController::class, 'destroy'])->name('delete');
        });
    });
});

// Permitted Auth Routes
Route::group(['middleware' => ['role.auth']], function () {
    /*
    |--------------------------------------------------------------------------
    | All available routes of user
    |--------------------------------------------------------------------------
    */
    Route::prefix('users')->group(function () {
        Route::name('users.')->group(function () {
            /** Grid */
            Route::get('/', [UserController::class, 'index'])->name('grid');

            /** Add, Update */
            Route::get('/create/{id?}', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
        });
    });
});
