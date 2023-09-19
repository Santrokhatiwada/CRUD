<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', [ProductController::class,'index'])->name('index');
// Route::get('/create', [ProductController::class,'create'])->name('create');
// Route::post('store/', [ProductController::class,'store'])->name('store');
// Route::get('show/{product}', [ProductController::class,'show'])->name('show');
// Route::get('edit/{product}', [ProductController::class,'edit'])->name('edit');
// Route::put('edit/{product}',[ProductController::class,'update'])->name('update');
// Route::delete('/{product}',[ProductController::class,'destroy'])->name('destroy');
Auth::routes();

Route::resource('products', ProductController::class);

Route::get('/register',function(){
  return redirect()->route('login');
    });

    Route::get('/', [WebsiteController::class, 'showHomePage'])->name('website.home');
    Route::get('/category/{id}', [WebsiteController::class, 'showCategoryPage'])->name('website.category');
    Route::get('/blog/{slug}', [WebsiteController::class, 'showBlogPage'])->name('website.blog');

Route::prefix('admin')->name('admin.')->group(function () {





    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::view('/templete', 'admin.layouts.app');

    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('call');


    Route::middleware('auth')->group(function(){

   
        Route::resource('/categories', CategoryController::class);
        Route::delete('/blog/deleteImage/{id}', [BlogController::class, 'deleteImage'])->name('blogs.deleteImage');
        Route::resource('/blogs', BlogController::class)->middleware('ipcheck:127.0.0.1');
    
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
        Route::resource('/users', UserController::class);

        Route::resource('/roles', RoleController::class);

        Route::resource('/permissions', PermissionController::class);

    // Route::resource('/categories', CategoryController::class)->middleware('auth');
    // Route::delete('/blog/deleteImage/{id}', [BlogController::class, 'deleteImage'])->name('blogs.deleteImage')->middleware('auth');
    // Route::resource('/blogs', BlogController::class)->middleware('ipcheck:127.0.0.1')->middleware('auth');

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

    // Route::resource('/users', UserController::class)->middleware('auth');
});




});
