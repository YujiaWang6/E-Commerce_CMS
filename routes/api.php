<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/brands', function(){
    $brands=Brand::orderBy('brandName')->get();
    return $brands;
});

Route::get('/categories',function(){
    $categories = Category::orderBy('categoryName')->get();
    return $categories;
});

Route::get('/products',function(){
    $products = Product::orderBy('created_at')->get();

    foreach($products as $key => $product){
        $products[$key]['brand']=Brand::where('id', $product['brand_id'])->first();
        $products[$key]['category'] = Category::where('id', $product['category_id'])->first();

    }

    return $products;
});