<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function admin(){
       return view('Admin.index');
   }
   public function profile(){
       return view('admin.profile');
   }
   public function invoice(){
       return view('admin.invoice');
   }
}
