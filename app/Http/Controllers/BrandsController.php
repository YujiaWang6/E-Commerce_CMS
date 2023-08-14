<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandsController extends Controller
{
    //
    public function list(){
        return view('brands.list',[
            'brands' => Brand::all()
        ]);
    }

    public function deleteConfirm(Brand $brand){
        return view('brands.delete',[
            'brand' => $brand
        ]);
    }

    public function deleted(Brand $brand){
        $brand->delete();
        return redirect('/console/brands/list')
            ->with('message', $brand->brandName.' has been deleted');
    }

    public function addForm(){
        return view('brands.add');
    }

    public function add(){
        $attributes = request()->validate([
            'brandName' => 'required',
        ]);
        
        $brand = new Brand();
        $brand->brandName = $attributes['brandName'];
        $brand->save();
        return redirect('/console/brands/list')
            ->with('message', $brand->brandName.' has been added');
    }

    public function editForm(Brand $brand){
        return view('brands.edit',[
            'brand'=>$brand
        ]);

    }
    
    public function edit(Brand $brand){
        $attributes=request()->validate([
            'brandName' => 'required',
        ]);
        $brand->brandName=$attributes['brandName'];
        $brand->save();
        return redirect('/console/brands/list')
            ->with('message',$brand->brandName.' has beedn updated');

    }
}
