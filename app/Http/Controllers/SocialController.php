<?php

namespace App\Http\Controllers;

use App\Http\Requests\socialValidation;
use Illuminate\Http\Request;
use App\Social;

class SocialController extends Controller
{
    public function index(){
        $social_link = Social::find(1);
        return view('Admin.social',compact('social_link'));
    }
    public function Store(socialValidation $request){
        Social::find(1)->update($request->all());
        return redirect(route('social.manage-link'))->withMsg('Link Update Success');
    }
}
