<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

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

Route::get('/',[BlogController::class, 'indexUser'])->name('blogs.indexUser');
Route::get('/{id}/blog', [BlogController::class, 'showBlogUser'])->name('blogs.showBlogUser');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index')->middleware('admin');
    Route::get('/blogs/{id}/showBlog', [BlogController::class, 'showBlog'])->name('blogs.showBlog')->middleware('admin');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create')->middleware('admin');
    Route::post('/blogs/store', [BlogController::class, 'store'])->name('blogs.store')->middleware('admin');
    Route::get('/blogs/{id}', [BlogController::class, 'edit'])->name('blogs.edit')->middleware('admin');
    Route::post('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update')->middleware('admin');
    Route::post('image-upload', [BlogController::class, 'storeImage'])->name('image.upload');

    //Route::delete('/blogs/destroy/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy')->middleware('admin');
    Route::resource('/blogs', BlogController::class)->middleware('admin');;


    Route::get('/banner', [BannerController::class, 'index'])->name('banner.index')->middleware('admin');
    Route::get('/banner/create', [BannerController::class, 'create'])->name('banner.create')->middleware('admin');
    Route::post('/banner/store', [BannerController::class, 'store'])->name('banner.store')->middleware('admin');
    Route::get('/banner/{id}', [BannerController::class, 'edit'])->name('banner.edit')->middleware('admin');
    Route::post('/banner/{id}', [BannerController::class, 'update'])->name('banner.update')->middleware('admin');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{id}/showCategory', [CategoryController::class, 'showCategory'])->name('categories.showCategory')->middleware('admin');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('admin');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store')->middleware('admin');
    Route::get('/categories/{id}', [CategoryController::class, 'edit'])->name('categories.edit')->middleware('admin');
    Route::post('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update')->middleware('admin');
    Route::resource('/categories', CategoryController::class)->middleware('admin');;

});


require __DIR__.'/auth.php';
