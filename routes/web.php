<?php

use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

//Route::get('/', function () {
//    return Inertia::render('homepage', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::group(['middleware' => ['role:admin', 'auth']], function () {
        route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');
    });
});

Route::group([
    'prefix' => 'developer',
    'namespace' => 'Developer',
    'as' => 'developer.'
], function () {
    Route::group(['middleware' => ['role:developer', 'auth']], function () {
        route::get('/', [\App\Http\Controllers\Developer\DashboardController::class, 'index'])->name('index');
    });
});



require __DIR__.'/auth.php';
