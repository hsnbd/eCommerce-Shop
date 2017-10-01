<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use DB;
class CountryController extends Controller
{
    public function index(){
        $allcountry = Country::select()->get();
        return view('admin/country',compact('allcountry'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'name'=> 'required|max:60|unique:countries'
        ]);
        Country::create($request->all());
        return redirect('/country/add')->with('messege','Country Inserted Successfully');
    }
    public function edit($id){
        $allcountry = DB::table('countries')->select()->where('id','=',$id)->first();
        return view('Admin/countryEdit')->with('allcountry', $allcountry);
    }
     public function update($id,Request $request){
        
         DB::table('countries')->where('id','=',$id)->update(['name'=>$request->name]);
         return redirect('/country/add')->with('messege','update Successful');
     }
     public function delete($id){
         DB::table('countries')->where('id','=',$id)->delete();
         return redirect('country/add')->with('messege','Delete Successful');
     }
}
