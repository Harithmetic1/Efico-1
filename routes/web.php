<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\TrainingController;

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

// Static routes
Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::post('/contact', [PagesController::class, 'submitContact'])->name('submitContact');

// Admin routes
Route::group([
	'prefix' => '/admin',
	'as' => 'admin.',
], function () {
	Route::get('/', [AdminController::class, 'index'])->name('index');
	Route::post('/', [AdminController::class, 'store'])->name('store');
	Route::get('/new', [AdminController::class, 'create'])->name('new');
});

// News routes
Route::group([
	'prefix' => '/news',
	'as' => 'news.',
], function () {
	Route::get('/', [NewsController::class, 'index'])->name('index');
	Route::post('/', [NewsController::class, 'store'])->name('store');
	Route::get('/{id}', [NewsController::class, 'show'])->name('show');
	Route::get('/new', [NewsController::class, 'create'])->name('new');
});

// Trainee routes
Route::group([
	'prefix' => '/trainee',
	'as' => 'trainee.',
], function () {
	Route::get('/', [TraineeController::class, 'create'])->name('new');
	Route::post('/', [TraineeController::class, 'store'])->name('store');
});

// Training routes
Route::group([
	'prefix' => '/training',
	'as' => 'training.',
], function () {
	Route::get('/', [TrainingController::class, 'create'])->name('new');
	Route::post('/', [TrainingController::class, 'store'])->name('store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
