<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CampignController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\InspirasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesBrandController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ZakatController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('component.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/laravel', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/hero', [TestController::class, 'index'])->name('hero');
    Route::get('/campign', function () {
        return view('component.campign');
    });
    Route::get('/services-brand', function () {
        return view('component.services');
    });
    Route::get('/services-card', function () {
        return view('component.services-card');
    });
    Route::get('/berita', function () {
        return view('component.berita');
    });
    Route::get('/inspirasi', function () {
        return view('component.inspirasi');
    });
    Route::get('/message-user', function () {
        return view('component.message');
    });
    Route::get('/zakat-profesi', function () {
        return view('component.zakat-profesi');
    });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('logout', [LoginController::class, 'logout']);
Route::get('register', [RegisteredUserController::class, 'create']);

Route::resource('heroAjax', HeroController::class);
Route::resource('beritaAjax', BeritaController::class);
Route::resource('inspirasiAjax', InspirasiController::class);
Route::resource('servicesAjax', ServicesController::class);
Route::resource('servicesBrandAjax', ServicesBrandController::class);
Route::resource('messageAjax', MessageController::class);
Route::resource('campignAjax', CampignController::class);
Route::resource('zakatAjax', ZakatController::class);


require __DIR__ . '/auth.php';
