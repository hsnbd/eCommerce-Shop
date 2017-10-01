<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\size;

class SizeController extends Controller
{
    public function index(){
        $allsize = DB::table('size')->select()->get();
        return view('admin/sizeAdd', compact('allsize'));
    }
    public function store(Request $request){
        $this->validate($request, [
           'name'=>'required' 
        ]);
        $size = size::create($request->all());
        return redirect('/size/add')->with('messege','size Inserted Successfully');
    }
     public function edit($id){
        $allsize = DB::table('size')->where('id',$id)->first();
       // print_r($sizes) ;
           return view('Admin/sizeEdit', compact('allsize'));
    }
    public function update(Request $request,$id){
        DB::table('size')->where('id',$id)->update(['name'=>$request->name]);
        return redirect('/size/add');
    }
    public function delete($id){
        DB::table('size')->where('id',$id)->delete();
        return redirect('/size/add');
    }
}
