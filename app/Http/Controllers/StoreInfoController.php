<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInfoValidation;
use App\StoreInfo;
use Illuminate\Http\Request;

class StoreInfoController extends Controller
{
    public function index(){
        $allinfo = StoreInfo::find(1);
        return view('Admin.storeinfo',compact('allinfo'));
    }
    public function Update(StoreInfoValidation $request){
        StoreInfo::find(1)->update($request->all());
        return redirect(route('store.info'))->withMsg('Store Info Update Success');
    }
}
