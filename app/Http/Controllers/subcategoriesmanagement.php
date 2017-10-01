<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subcategory;
use Illuminate\Support\Facades\DB;
use App\category;

class subcategoriesmanagement extends Controller
{
    public function index(){
        $categories= category::select()->get();
        $subcat = DB::table('subcategories')->select()->get();
        return view('admin/subCategories')
                ->with('caregory',$categories)
                ->with('subcat',$subcat);
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|max:50|unique:subcategories',
            'categoriesid' => 'required|exists:categories,id',
        ]);
        subcategory::create($request->all());
        return redirect('sub-category/add')->with('messege','Sub Category Inserted Succesfully');
    }
     public function edit($id){
         $categories= category::select()->get();
        $subcategory = DB::table('subcategories')->where('id',$id)->first();
        return view('Admin/subCategoryEdit', compact('subcategory'))
   ->with('category',$categories);
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required|max:50|unique:subcategories',
            'categoriesid' => 'required|exists:categories,id',
        ]);
        DB::table('subcategories')->where('id',$id)->update(['name'=>$request->name]);
        return redirect('sub-category/add');
    }
    public function delete($id){
        DB::table('subcategories')->where('id',$id)->delete();
        return redirect('sub-category/add');
    }
}
