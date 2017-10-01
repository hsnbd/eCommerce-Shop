<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecialOfferController extends Controller
{
    public function latestCollection(){
        return view('Admin.latest-collection');
    }
}
