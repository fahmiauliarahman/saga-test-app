<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Setting\CategoryController;
use App\Http\Controllers\Setting\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('auth/google/login', [AuthenticatedSessionController::class, 'google'])->name('google-login');
Route::get('auth/google/callback', [AuthenticatedSessionController::class, 'google_callback'])->name('google-callback');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::prefix('settings')->group(function () {
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
        Route::post('/profile', [ProfileController::class, 'pass_submit'])->name('profile.password');
        Route::post('/update', [ProfileController::class, 'update_profile'])->name('profile.update');
        Route::resource('category', CategoryController::class);
        Route::group(['middleware' => ['role:admin']], function () {
            Route::resource('user', UsersController::class);
        });
    });

});

require __DIR__ . '/auth.php';

Route::get('{category?}', [HomeController::class, 'homepage'])->name('homepage');
Route::get('{category}/{article?}', [HomeController::class, 'detail_article'])->name('article.detail');

