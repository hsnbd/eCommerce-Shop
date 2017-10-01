<?php

namespace App\Http\Controllers;

use App\ReviewProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewProductController extends Controller
{
    public function review_product (Request $request){
        date_default_timezone_set("Asia/Dhaka");
        $this->validate($request,[
            'email'=> 'required|email',
            'name' => 'required ',
            'message' =>'required '
        ]);
        $data = [
            'product_id'=> $request->pid,
            'users_email'=> $request->email,
            'user_name' => $request->name,
            'message' => $request->message,
            'created_at' => date("Y-m-d H:i:s")
        ];
        //return $data;
        $html= '';
        $id = DB::table('review_products')->insertGetId($data);
        if($id){
            $review = DB::table('review_products')->where('id',$id)->first();
            $html = "Thanks For Your Review";
            $html .= '
            <div class="review-style">
            <h4> <strong>Name: </strong>' .$review->user_name.'</h4>
            <p><strong>Message: </strong> '.$review->message.'</p>
            <p><strong>Review Time:</strong>'.$review->created_at.'</p>
            </div>
            ';
        }else{
            $html .=  "Sorry Try Again Later";
        }
        echo $html;
//       //return response()->json($jdata);
    }
}
