<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductsController extends Controller
{
    //

    public function list(){
        return view('products.list',[
            'products'=>Product::all()
        ]);
    }

    public function deleteConfirm(Product $product){
        return view('products.delete',[
            'product'=>$product
        ]);
    }

    public function deleted(Product $product){
        $product->delete();
        return redirect('/console/products/list')
            ->with('message',$product->productName . ' has been deleted');
    }

    public function addForm(){
        return view('products.add',[
            'brands' => Brand::all(),
            'categories' => Category::all(),
        ]);
    }

    public function add(){
        $attributes = request()->validate([
            'productName'=>'required',
            'description'=>'nullable',
            'url'=>'nullable|url',
            'image'=>'nullable|url',
            'price'=>'required',
            'stockQuantity'=>'required',
            'brand_id'=>'required',
            'category_id'=>'required',
        ]);

        $product = new Product();
        $product->productName = $attributes['productName'];
        $product->description = $attributes['description'];
        $product->url = $attributes['url'];
        $product->image = $attributes['image'];
        $product->price = $attributes['price'];
        $product->stockQuantity = $attributes['stockQuantity'];
        $product->brand_id = $attributes['brand_id'];
        $product->category_id = $attributes['category_id'];
        $product->save();

        return redirect('/console/products/list')
            ->with('message', $product->productName . ' has been added');
    }

    public function editForm(Product $product){
        return view('products.edit',[
            'product'=>$product,
            'brands' => Brand::all(),
            'categories' => Category::all(),
        ]);
    }

    public function edit(Product $product){
        $attributes = request()->validate([
            'productName'=>'required',
            'description'=>'nullable',
            'url'=>'nullable|url',
            'image'=>'nullable|url',
            'price'=>'required',
            'stockQuantity'=>'required',
            'brand_id'=>'required',
            'category_id'=>'required',
        ]);

        $product->productName = $attributes['productName'];
        $product->description = $attributes['description'];
        $product->url = $attributes['url'];
        $product->image = $attributes['image'];
        $product->price = $attributes['price'];
        $product->stockQuantity = $attributes['stockQuantity'];
        $product->brand_id = $attributes['brand_id'];
        $product->category_id = $attributes['category_id'];
        $product->save();

        return redirect('/console/products/list')
            ->with('message', $product->productName . ' has been edited');
    }

}
