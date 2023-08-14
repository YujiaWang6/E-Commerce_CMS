<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
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
    return view('welcome');
});


Route::get('/console/dashboard', [ConsoleController::class, 'dashboard'])->middleware('auth');
Route::get('/console/login', [ConsoleController::class, 'loginForm'])->middleware('guest')->name('login');
Route::post('/console/login', [ConsoleController::class, 'login'])->middleware('guest');
Route::get('/console/logout', [ConsoleController::class, 'logout'])->middleware('auth');

Route::get('/console/brands/list', [BrandsController::class, 'list'])->middleware('auth');
Route::get('/console/brands/delete/{brand:id}', [BrandsController::class, 'deleteConfirm'])->where('brand','[0-9]+')->middleware('auth');
Route::post('/console/brands/deleted/{brand:id}', [BrandsController::class, 'deleted'])->where('brand','[0-9]+')->middleware('auth');
Route::get('/console/brands/add', [BrandsController::class, 'addForm'])->middleware('auth');
Route::post('/console/brands/add', [BrandsController::class, 'add'])->middleware('auth');
Route::get('/console/brands/edit/{brand:id}', [BrandsController::class, 'editForm'])->where('brand','[0-9]+')->middleware('auth');
Route::post('/console/brands/edit/{brand:id}', [BrandsController::class, 'edit'])->where('brand', '[0-9]+')->middleware('auth');

Route::get('/console/categories/list', [CategoriesController::class, 'list'])->middleware('auth');
Route::get('/console/categories/delete/{category:id}', [CategoriesController::class, 'deleteConfirm'])->where('category','[0-9]+')->middleware('auth');
Route::post('/console/categories/deleted/{category:id}', [CategoriesController::class, 'deleted'])->where('category','[0-9]+')->middleware('auth');
Route::get('/console/categories/add', [CategoriesController::class, 'addForm'])->middleware('auth');
Route::post('/console/categories/add', [CategoriesController::class, 'add'])->middleware('auth');
Route::get('/console/categories/edit/{category:id}', [CategoriesController::class, 'editForm'])->where('category','[0-9]+')->middleware('auth');
Route::post('/console/categories/edit/{category:id}', [CategoriesController::class, 'edit'])->where('category', '[0-9]+')->middleware('auth');

Route::get('/console/products/list', [ProductsController::class, 'list'])->middleware('auth');
Route::get('/console/products/delete/{product:id}', [ProductsController::class, 'deleteConfirm'])->where('product','[0-9]+')->middleware('auth');
Route::post('/console/products/deleted/{product:id}', [ProductsController::class, 'deleted'])->where('product','[0-9]+')->middleware('auth');
Route::get('/console/products/add', [ProductsController::class, 'addForm'])->middleware('auth');
Route::post('/console/products/add', [ProductsController::class, 'add'])->middleware('auth');
Route::get('/console/products/edit/{product:id}', [ProductsController::class, 'editForm'])->where('product','[0-9]+')->middleware('auth');
Route::post('/console/products/edit/{product:id}', [ProductsController::class, 'edit'])->where('product','[0-9]+')->middleware('auth');