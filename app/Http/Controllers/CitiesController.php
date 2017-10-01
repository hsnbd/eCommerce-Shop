<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\City;
use Illuminate\Support\Facades\DB;
class CitiesController extends Controller
{
    public function index(){
        
        $allcountry = DB::table('countries')->select()->get();
        $allcities = City::select()->get();
        return view('Admin/City', compact('allcountry'))->with('allcities',$allcities);
    }
    public function store(Request $request){
        $this->validate($request, [
            'name'=> 'required | max:30',
            'countriesid'=>'required|exists:countries,id'
        ]);
        City::create($request->all());
        return redirect('/city/add')->with('messege','City Inserted Successfully');
    }
    public function edit($id){
        $countries = Country::select()->get();
        $cities = City::select()->where('id','=',$id)->first();
        return view('Admin/cityEdit')->with(['cities'=>$cities,'countries'=>$countries]);
    }
    public function update($id,Request $request){
        $this->validate($request, [
            'name'=> 'required',
            'countriesid'=>'required|exists:countries,id'
        ]);
        DB::table('cities')->where('id',$id)->update([
            'name'=>$request->name,
            'countriesid'=>$request->countriesid
            ]);
        return redirect('/city/add')->with('messege','City Updated Successfully');
    }
}
