<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoriesController extends Controller
{
    //
    public function list(){
        return view('categories.list',[
            'categories'=>Category::all()
        ]);
    }

    public function delete(Category $category){
        $category->delete();
        return redirect('/console/categories/list')
            ->with('message', $category->categoryName . ' has been deleted');
    }
    public function addForm(){
        return view('categories.add');
    }

    public function add(){
        $attributes = request()->validate([
            'categoryName'=>'required',
        ]);

        $category=new Category();
        $category->categoryName=$attributes['categoryName'];
        $category->save();
        return redirect('/console/categories/list')
            ->with('message', $category->categoryName . " has been added");
    }

    public function editForm(Category $category){
        return view('categories.edit',[
            'category'=>$category
        ]);
    }

    public function edit(Category $category){
        $attributes=request()->validate([
            'categoryName'=>'required',
        ]);
        $category->categoryName=$attributes['categoryName'];
        $category->save();
        return redirect('/console/categories/list')
            ->with('message', $category->categoryName . " has been updated");
    }

}
