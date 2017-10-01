<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\category;

class categoriesmanagement extends Controller
{
    public function index(){
        $allcategories = category::select()->get();
        return view('admin/categoryAdd', compact('allcategories'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required|max:60|unique:categories',
        ]);
        $categories = category::create($request->all());
        return redirect('/category/add')->with('messege','Category Added Successfuly');
    }
    public function edit($id){
        $allcat = DB::table('categories')->where('id',$id)->first();
        return view('Admin/categoryEdit', compact('allcat'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name'=>'required|max:60|unique:categories',
        ]);
        DB::table('categories')->where('id',$id)->update(['name'=>$request->name]);
        return redirect('/category/add');
    }
    public function delete($id){
        DB::table('categories')->where('id',$id)->delete();
        return redirect('/category/add');
    }
}
