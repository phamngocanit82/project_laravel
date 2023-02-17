<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\User\UserGroupController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\Product\ProductGroupController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\SpecialController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
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

    #Section About
    Route::prefix('section-about')->name('section-about.')->group(function () {
        Route::get('add', [SectionAboutController::class, 'add'])->name('index');
        Route::get('/', [SectionAboutController::class, 'index'])->name('index');
        Route::get('add', [SectionAboutController::class, 'add'])->name('add');
        Route::post('add', [SectionAboutController::class, 'postAdd'])->name('post-add');
        Route::get('edit/{id}', [SectionAboutController::class, 'edit'])->name('edit');
        Route::post('edit', [SectionAboutController::class, 'postEdit'])->name('post-edit');
        Route::get('list', [SectionAboutController::class, 'list']);
        Route::post('active', [SectionAboutController::class, 'active']);
        Route::delete('delete', [SectionAboutController::class, 'delete']);
    });
    #User Group
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
    #User
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
    
    #Product group
    Route::prefix('product-group')->name('product-group.')->group(function () {
        Route::get('add', [ProductGroupController::class, 'add'])->name('index');
        Route::get('/', [ProductGroupController::class, 'index'])->name('index');
        Route::get('add', [ProductGroupController::class, 'add'])->name('add');
        Route::post('add', [ProductGroupController::class, 'postAdd'])->name('post-add');
        Route::get('edit/{id}', [ProductGroupController::class, 'edit'])->name('edit');
        Route::post('edit', [ProductGroupController::class, 'postEdit'])->name('post-edit');
        Route::get('list', [ProductGroupController::class, 'list']);
        Route::post('active', [ProductGroupController::class, 'active']);
        Route::delete('delete', [ProductGroupController::class, 'delete']);
    });
    #Product
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('add', [ProductController::class, 'add'])->name('add');
        Route::post('add', [ProductController::class, 'postAdd'])->name('post-add');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('edit', [ProductController::class, 'postEdit'])->name('post-edit');
        Route::get('list', [ProductController::class, 'list']);
        Route::post('active', [ProductController::class, 'active']);
        Route::delete('delete', [ProductController::class, 'delete']);
    });
    #Special
    Route::prefix('special')->name('special.')->group(function () {
        Route::get('add', [SpecialController::class, 'add'])->name('index');
        Route::get('/', [SpecialController::class, 'index'])->name('index');
        Route::get('add', [SpecialController::class, 'add'])->name('add');
        Route::post('add', [SpecialController::class, 'postAdd'])->name('post-add');
        Route::get('edit/{id}', [SpecialController::class, 'edit'])->name('edit');
        Route::post('edit', [SpecialController::class, 'postEdit'])->name('post-edit');
        Route::get('list', [SpecialController::class, 'list']);
        Route::post('active', [SpecialController::class, 'active']);
        Route::delete('delete', [SpecialController::class, 'delete']);
    });
    #Event
    Route::prefix('event')->name('event.')->group(function () {
        Route::get('add', [EventController::class, 'add'])->name('index');
        Route::get('/', [EventController::class, 'index'])->name('index');
        Route::get('add', [EventController::class, 'add'])->name('add');
        Route::post('add', [EventController::class, 'postAdd'])->name('post-add');
        Route::get('edit/{id}', [EventController::class, 'edit'])->name('edit');
        Route::post('edit', [EventController::class, 'postEdit'])->name('post-edit');
        Route::get('list', [EventController::class, 'list']);
        Route::post('active', [EventController::class, 'active']);
        Route::delete('delete', [EventController::class, 'delete']);
    });
    #Gallery
    Route::prefix('gallery')->name('gallery.')->group(function () {
        Route::get('add', [GalleryController::class, 'add'])->name('index');
        Route::get('/', [GalleryController::class, 'index'])->name('index');
        Route::get('add', [GalleryController::class, 'add'])->name('add');
        Route::post('add', [GalleryController::class, 'postAdd'])->name('post-add');
        Route::get('edit/{id}', [GalleryController::class, 'edit'])->name('edit');
        Route::post('edit', [GalleryController::class, 'postEdit'])->name('post-edit');
        Route::get('list', [GalleryController::class, 'list']);
        Route::post('active', [GalleryController::class, 'active']);
        Route::delete('delete', [GalleryController::class, 'delete']);
    });
    #Upload
    Route::post('upload-services', [UploadController::class, 'store']);

});