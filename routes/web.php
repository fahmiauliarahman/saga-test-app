<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
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
    Route::resource('category', CategoryController::class);
});

require __DIR__ . '/auth.php';

Route::get('{category?}', [HomeController::class, 'homepage'])->name('homepage');
Route::get('{category}/{article?}', [HomeController::class, 'detail_article'])->name('article.detail');

