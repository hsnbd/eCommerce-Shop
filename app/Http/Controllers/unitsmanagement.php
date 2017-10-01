<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\unit;

class unitsmanagement extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if(Auth::check()){
            if(Auth::type() != 'admin'){

            }
        }
    }

    public function index(){
       $allunits= DB::table('units')->select()->get();
        return view('admin/unitAdd', compact('allunits'));
    }
    public function store(Request $request){
        $this->validate($request, [
           'name'=>'required |max:60' 
        ]);
        $unit = unit::create($request->all());
        return redirect('/unit/add')->with('messege','Unit Inserted Successfully');
    }
   public function edit($id){
        $allunit = DB::table('units')->where('id',$id)->first();
        return view('Admin/unitEdit', compact('allunit'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
           'name'=>'required |max:60' 
        ]);
        DB::table('units')->where('id',$id)->update(['name'=>$request->name]);
        return redirect('/unit/add');
    }
    public function delete($id){
        DB::table('units')->where('id',$id)->delete();
        return redirect('/unit/add');
    }
    
}
