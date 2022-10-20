<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Main\IndexController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Post\IndexController as ApiPostIndexController;
use App\Http\Controllers\API\Post\ShowController as ApiPostShowController;
use App\Http\Controllers\API\Category\IndexController as ApiCategoryIndexController;
use App\Http\Controllers\API\Category\ShowController as ApiCategoryShowController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware(['auth'])->group(function() {
    Route::get('/', IndexController::class)->name('main.index');
    Route::group(['middleware' => ['admin']], function() {
        Route::resource('categories', CategoryController::class);
        Route::resource('posts', PostController::class);
        Route::resource('users', UserController::class);
    });
});

Route::group(['prefix' => 'api', 'middleware' => ['isUserAuth']], function() {
    Route::get('/posts', ApiPostIndexController::class);
    Route::get('/posts/{post}', ApiPostShowController::class);
    Route::get('/categories', ApiCategoryIndexController::class);
    Route::get('/categories/{categories}', ApiCategoryShowController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
