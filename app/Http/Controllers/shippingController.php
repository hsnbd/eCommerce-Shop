<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class shippingController extends Controller
{
    public function existing_address(){
        $id =  Auth::id();
        $existing_address = DB::table('shipping')->where('usersid',$id)->get();
        $html = "";
        foreach($existing_address as $value){
            $html .= "<div class='existing_address_box' id='{$value->id}'>
            <h4><strong>Name: </strong>{$value->name}</h4>
            <p><strong>Address: </strong>{$value->address}</p>
            <p><strong>Contact: </strong>{$value->contact}</p>
            </div>";
        }
        echo $html;
    }
}
