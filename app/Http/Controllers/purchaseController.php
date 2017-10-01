<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\product;

class purchaseController extends Controller
{

    public function congrats(){
        return view('congrats');
    }
    public function confirm(Request $request) {
        date_default_timezone_set("Asia/Dhaka");

        $user_id = Auth::id();
        /* Shipping Start */
        if ($request->choice == 1) {
            $data = array(
                "name" => $request->name,
                "address" => $request->address,
                "contact" => $request->contact,
                "usersid" => $user_id
            );
            $shippingid = DB::table('shipping')->insertGetId($data);
        } else {
            $shippingid = $request->shippingid;
        }

        /* Shipping End */


        $mytime = Carbon::now();
        /* Salse Start */
        $data = [
            'shippingid' => $shippingid,
            'date' => date("Y-m-d H:i:s")
        ];
        $sid = DB::table('sales')->insertGetId($data);
        /* Salse End */

        //Shipping Details Start

        $spdtid = $request->session()->get('pdtid');
        $sqtyid = $request->session()->get('qtyid');

        foreach ($spdtid as $pid) {
            $index = array_search($pid, $spdtid);
            $pdt = product::where('id', $pid)->first();

            $data = [
                'salesid' => $sid,
                'productsid' => $pid,
                'quantity' => $sqtyid[$index],
                'vat' => $pdt->vat,
                "discount" => $pdt->discount
            ];

            DB::table('salesdetail')->insert($data);
        }
        $request->session()->forget(['pdtid', 'qtyid', 'totalprice', 'stitle', 'spicture', 'sprice']);
        return redirect(route('congrats.page'));



    }
}
