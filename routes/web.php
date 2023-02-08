<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\User\UserGroupController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\Product\ProductGroupController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\SectionAboutController;
use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\MainController;
use App\Http\Controllers\Client\ServiceController;
use \App\Http\Controllers\Admin\UploadController;
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
Route::get('admin/user/login', [LoginController::class, 'index'])->name('login');
Route::get('admin/user/forgot-password', [LoginController::class, 'forgot_password']);
Route::get('admin/user/recover-password', [LoginController::class, 'recover_password']);

Route::get('', [MainController::class, 'index']);
Route::get('services', [ServiceController::class, 'index']);
Route::get('about', [AboutController::class, 'index']);
Route::get('contact', [ContactController::class, 'index']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminMainController::class, 'index']);
    Route::get('main', [AdminMainController::class, 'index']);

    Route::prefix('user-group')->name('user-group.')->group(function () {
        Route::get('/', [UserGroupController::class, 'index'])->name('index');
        Route::get('add', [UserGroupController::class, 'add'])->name('add');
        Route::post('add', [UserGroupController::class, 'postAdd'])->name('post-add');
        Route::get('edit/{id}', [UserGroupController::class, 'edit'])->name('edit');
        Route::post('edit', [UserGroupController::class, 'postEdit'])->name('post-edit');
        Route::get('list', [UserGroupController::class, 'list']);
        Route::post('active', [UserGroupController::class, 'active']);
        Route::delete('delete', [UserGroupController::class, 'delete']);
    });
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('add', [UserController::class, 'add'])->name('add');
        Route::post('add', [UserController::class, 'postAdd'])->name('post-add');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('edit', [UserController::class, 'postEdit'])->name('post-edit');
        Route::get('list', [UserController::class, 'list']);
        Route::post('active', [UserController::class, 'active']);
        Route::delete('delete', [UserController::class, 'delete']);
    });
    
    #Section About
    Route::prefix('section-about')->group(function () {
        Route::get('add', [SectionAboutController::class, 'add']);
        Route::get('list', [SectionAboutController::class, 'list']);
    });

    #Product group
    Route::prefix('product-group')->name('product-group.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('add', [ProductGroupController::class, 'add'])->name('add');
        Route::post('add', [ProductGroupController::class, 'postAdd'])->name('post-add');
        Route::get('list', [ProductGroupController::class, 'list']);
    });
    Route::prefix('product')->group(function () {
        Route::get('add', [ProductController::class, 'add']);
        Route::get('list', [ProductController::class, 'list']);
    });

    #Upload
    Route::post('upload-services', [UploadController::class, 'store']);

});