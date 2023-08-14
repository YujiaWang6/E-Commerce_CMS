<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    //

    public function list(){
        return view('products.list',[
            'products'=>Product::all()
        ]);
    }

    public function delete(Product $product){
        $product->delete();
        return redirect('/console/products/list')
            ->with('message',$product->productName . ' has been deleted');
    }


}
