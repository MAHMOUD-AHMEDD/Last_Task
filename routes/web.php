<?php

use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsControllerResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategoriesControllerResource;
use App\Http\Controllers\admin\QuestionsControllerResource;

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
    return redirect()->route('products.index');
});

Route::group(['prefix'=>'/auth'],function (){
    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('/login-post',[LoginController::class,'save'])->name('auth.login');
});
Route::get('/', [HomeController::class,'index'])->middleware('auth');

Route::resources([
    'products'=>ProductsControllerResource::class
]);
Route::resource('admin/categories', CategoriesControllerResource::class);
//Route::resource('categories', CategoriesController::class);
Route::resource('admin/categories/{category}/questions', QuestionsControllerResource::class);

// Client Routes
Route::get('/products/create', [ProductsControllerResource::class, 'create'])->name('products.create');
Route::post('/products', [ProductsControllerResource::class, 'store'])->name('products.store');
