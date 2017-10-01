<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;


class CartController extends Controller
{

    public function remove(Request $request){
        $pid = $request->pid;

        $spdtid = $request->session()->get('pdtid');
        $sqtyid = $request->session()->get('qtyid');
        $totalprice = $request->session()->get('totalprice');
        $stitle = $request->session()->get('stitle');
        $spicture = $request->session()->get('spicture');
        $sprice = $request->session()->get('sprice');

        if(count($spdtid) >1){
            $index = array_search($pid,$spdtid);
            $totalprice -= ($sprice[$index] * $sqtyid[$index]);

            unset($spdtid[$index]);
            unset($sqtyid[$index]);
            unset($stitle[$index]);
            unset($spicture[$index]);
            unset($sprice[$index]);

            $request->session()->put('pdtid', $spdtid);
            $request->session()->put('qtyid', $sqtyid);
            $request->session()->put('stitle', $stitle);
            $request->session()->put('spicture', $spicture);
            $request->session()->put('sprice', $sprice);
            $request->session()->put('totalprice', $totalprice);
            echo $totalprice;
        }else{

            $request->session()->forget(['pdtid', 'qtyid', 'totalprice', 'stitle', 'spicture', 'sprice']);
            echo 0;
        }
    }
    public function add(Request $request){

        $pid = $request->pid;
        $qty = $request->qty;

        $spdtid = $request->session()->get('pdtid');
        $sqtyid = $request->session()->get('qtyid');
        $totalprice = $request->session()->get('totalprice');
        $stitle = $request->session()->get('stitle');
        $spicture = $request->session()->get('spicture');
        $sprice = $request->session()->get('sprice');

        $pdt = product::where('id',$pid)->first();
        $price =$pdt->price;
        $vat = $pdt->vat;
        $discount = $pdt->discount;
        $title = $pdt->title;

        if (file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture1}")){
            $picture  = "product-1-{$pdt->id}.{$pdt->picture1}";
        }elseif (fille_exists("images/product/product-2-{$pdt->id}.{$pdt->picture2}")){
            $picture = "product-2-{$pdt->id}.{$pdt->picture2}";
        }elseif (file_exists("images/product/product-3-{$pdt->id}.{$pdt->picture3}")){
            $picture = "picture/product/product-3-{$pdt->id}.{$pdt->picture3}";
        }else{
            $picture = "noimage.gif";
        }

        if($spdtid){
            $index = array_search($pid, $spdtid);
            if($index !== false){
                $jdata['Total'] = $totalprice + (PriceCal($price, $vat, $discount)* $qty) -(PriceCal($price, $vat, $discount) * $sqtyid[$index]);
                $request->session()->put('totalprice', $jdata['Total']);
                $jdata['title'] = $title;
                $request->session()->put('title',$jdata['title']);

                $sqtyid[$index] = $qty;
                $request->session()->put('qtyid', $sqtyid);
                $jdata['msg'] =  "Cart Update Successful";
                $jdata['status'] = 2;
            }else{
                $spdtid[] = $pid;
                $sqtyid[] = $qty;
                $stitle[] = $title;
                $spicture[] = $picture;
                $sprice[] = PriceCal($price, $vat,$discount);
                $request->session()->put('pdtid',$spdtid);
                $request->session()->put('qtyid',$sqtyid);
                $request->session()->put('stitle',$stitle);
                $request->session()->put('spicture',$spicture);
                $request->session()->put('sprice',$sprice);



                $jdata['msg'] =  "Cart Added Successful";
                $jdata['status'] =1;

                $jdata['Total'] =$totalprice + (PriceCal($price, $vat, $discount) * $qty);
                $request->session()->put('totalprice',$jdata['Total']);
                $jdata['title'] = $title;
                $jdata['picture'] = $picture;
                $jdata['price'] = PriceCal($price,$vat,$discount);
            }
        }else{
            $request->session()->put('pdtid',array($pid));
            $request->session()->put('qtyid',array($qty));
            $request->session()->put('stitle',array($title));
            $request->session()->put('spicture',array($picture));
            $request->session()->put('sprice',array(PriceCal($price,$vat,$discount)));

                $jdata['msg'] = "Cart Add Seccessful";
                $jdata['Total'] = PriceCal($price, $vat, $discount) * $qty ;
                $request->session()->put('totalprice',$jdata['Total']);

                $jdata['picture'] =$picture;
                $jdata['title'] = $title;
                $jdata['status'] = 1;
                $jdata['price'] = PriceCal($price,$vat,$discount);
        }

        return response()->json($jdata);

    }

    public  function homeadd(Request $request){
        $pid = $request->pid;
        $qty = $request->qty;

        $spdtid = $request->session()->get('pdtid');
        $sqtyid = $request->session()->get('qtyid');
        $totalprice = $request->session()->get('totalprice');
        $stitle = $request->session()->get('stitle');
        $spicture = $request->session()->get('spicture');
        $sprice = $request->session()->get('sprice');

        $pdt = product::where('id',$pid)->first();
        $price =$pdt->price;
        $vat = $pdt->vat;
        $discount = $pdt->discount;
        $title = $pdt->title;

        if (file_exists("images/product/product-1-{$pdt->id}.{$pdt->picture1}")){
            $picture  = "product-1-{$pdt->id}.{$pdt->picture1}";
        }elseif (fille_exists("images/product/product-2-{$pdt->id}.{$pdt->picture2}")){
            $picture = "product-2-{$pdt->id}.{$pdt->picture2}";
        }elseif (file_exists("images/product/product-3-{$pdt->id}.{$pdt->picture3}")){
            $picture = "picture/product/product-3-{$pdt->id}.{$pdt->picture3}";
        }else{
            $picture = "noimage.gif";
        }
        if($spdtid){
            $index = array_search($pid, $spdtid);
            if($index !== false){
                $jdata['Total'] = $totalprice + (PriceCal($price, $vat, $discount)* $qty) -(PriceCal($price, $vat, $discount) * $sqtyid[$index]);
                $request->session()->put('totalprice', $jdata['Total']);
                $jdata['title'] = $title;
                $request->session()->put('title',$jdata['title']);

                $sqtyid[$index] = $qty;
                $request->session()->put('qtyid', $sqtyid);
                $jdata['msg'] =  "Cart Update Successful";
                $jdata['status'] = 2;
            }else{
                $spdtid[] = $pid;
                $sqtyid[] = $qty;
                $stitle[] = $title;
                $spicture[] = $picture;
                $sprice[] = PriceCal($price, $vat,$discount);
                $request->session()->put('pdtid',$spdtid);
                $request->session()->put('qtyid',$sqtyid);
                $request->session()->put('stitle',$stitle);
                $request->session()->put('spicture',$spicture);
                $request->session()->put('sprice',$sprice);

                $jdata['msg'] =  "Cart Added Successful";
                $jdata['status'] =1;

                $jdata['Total'] =$totalprice + (PriceCal($price, $vat, $discount) * $qty);
                $request->session()->put('totalprice',$jdata['Total']);
                $jdata['title'] = $title;
                $jdata['picture'] = $picture;
                $jdata['price'] = PriceCal($price,$vat,$discount);
            }
        }else{
            $request->session()->put('pdtid',array($pid));
            $request->session()->put('qtyid',array($qty));
            $request->session()->put('stitle',array($title));
            $request->session()->put('spicture',array($picture));
            $request->session()->put('sprice',array(PriceCal($price,$vat,$discount)));

            $jdata['msg'] = "Cart Add Seccessful";
            $jdata['Total'] = PriceCal($price, $vat, $discount) * $qty ;
            $request->session()->put('totalprice',$jdata['Total']);

            $jdata['picture'] =$picture;
            $jdata['title'] = $title;
            $jdata['status'] = 1;
            $jdata['price'] = PriceCal($price,$vat,$discount);
        }

        return response()->json($jdata);
    }

    public function homeremove(Request $request){

        $pid = $request->pid;

        $spdtid = $request->session()->get('pdtid');
        $sqtyid = $request->session()->get('qtyid');
        $totalprice = $request->session()->get('totalprice');
        $stitle = $request->session()->get('stitle');
        $spicture = $request->session()->get('spicture');
        $sprice = $request->session()->get('sprice');

        if(count($spdtid) >1){
            $index = array_search($pid,$spdtid);
            $totalprice -= ($sprice[$index] * $sqtyid[$index]);

            unset($spdtid[$index]);
            unset($sqtyid[$index]);
            unset($stitle[$index]);
            unset($spicture[$index]);
            unset($sprice[$index]);

            $request->session()->put('pdtid', $spdtid);
            $request->session()->put('qtyid', $sqtyid);
            $request->session()->put('stitle', $stitle);
            $request->session()->put('spicture', $spicture);
            $request->session()->put('sprice', $sprice);
            $request->session()->put('totalprice', $totalprice);
            echo $totalprice;
        }else{
            $request->session()->forget(['pdtid','qtyid','stitle','spicture','sprice','totalprice']);
            echo 0;
        }
    }

    public function udpatecheckout(Request $request){
        $pid = $request->pid;
        $qty = $request->qty;
        $regular_price = $request->regular_price;

        $spdtid = $request->session()->get('pdtid');
        $sqtyid = $request->session()->get('qtyid');
        $totalprice = $request->session()->get('totalprice');

        $pdt = product::where('id', $pid)->first();
        $price = $pdt->price;
        $vat = $pdt->vat;
        $discount = $pdt->discount;

        if ($spdtid) {
            $index = array_search($pid, $spdtid);

            $jdata['subtotal-del'] = PriceCal($price, $vat, 0) * $qty;
            $jdata['subtotal'] = PriceCal($price, $vat, $discount) * $qty;
            // dd($request->all());
            $jdata['regular_price'] = $regular_price + (PriceCal($price, $vat, 0) * $qty) - (PriceCal($price, $vat, 0) * $sqtyid[$index]);

            $jdata['Total'] = $totalprice + (PriceCal($price, $vat, $discount) * $qty) - (PriceCal($price, $vat, $discount) * $sqtyid[$index]);
            $request->session()->put('totalprice', $jdata['Total']);
            $jdata['discount_price'] = $jdata['regular_price'] - $jdata['Total'];

            $sqtyid[$index] = $qty;
            $request->session()->put('qtyid', $sqtyid);
            $jdata['msg'] = "Cart Update Successful";
            $jdata['status'] = 2;

            return response()->json($jdata);
        }

    }

    public function removecheckout(Request $request){
            $pid = $request->pid;
            $regular_price = $request->regular_price;

        $spdtid = $request->session()->get('pdtid');
        $sqtyid = $request->session()->get('qtyid');
        $totalprice = $request->session()->get('totalprice');
        $stitle = $request->session()->get('stitle');
        $spicture = $request->session()->get('spicture');
        $sprice = $request->session()->get('sprice');

        if(count($spdtid) >1){
            $index = array_search($pid,$spdtid);
            $totalprice -= ($sprice[$index] * $sqtyid[$index]);

            $pdt = product::where('id', $pid)->first();
            $price = $pdt->price;
            $vat = $pdt->vat;
            $discount = $pdt->discount;

            $jdata['regular_price'] = $regular_price - (PriceCal($price, $vat, 0) * $sqtyid[$index]);

            $jdata['discount_price'] = $jdata['regular_price'] - $totalprice;
            $jdata['Total'] = $totalprice;

            unset($spdtid[$index]);
            unset($sqtyid[$index]);
            unset($stitle[$index]);
            unset($spicture[$index]);
            unset($sprice[$index]);

            $request->session()->put('pdtid', $spdtid);
            $request->session()->put('qtyid', $sqtyid);
            $request->session()->put('stitle', $stitle);
            $request->session()->put('spicture', $spicture);
            $request->session()->put('sprice', $sprice);
            $request->session()->put('totalprice', $totalprice);
            return response()->json($jdata);
        }else{
            $request->session()->forget(['pdtid', 'qtyid', 'totalprice', 'stitle', 'spicture', 'sprice']);
            $jdata['Total'] = 0;
            return response()->json($jdata);
        }
    }

    public function singleremove(Request $request){
        $pid = $request->pid;

        $spdtid = $request->session()->get('pdtid');
        $sqtyid = $request->session()->get('qtyid');
        $totalprice = $request->session()->get('totalprice');
        $stitle = $request->session()->get('stitle');
        $spicture = $request->session()->get('spicture');
        $sprice = $request->session()->get('sprice');

        if(count($spdtid) >1){
            $index = array_search($pid,$spdtid);
            $totalprice -= ($sprice[$index] * $sqtyid[$index]);

            unset($spdtid[$index]);
            unset($sqtyid[$index]);
            unset($stitle[$index]);
            unset($spicture[$index]);
            unset($sprice[$index]);

            $request->session()->put('pdtid', $spdtid);
            $request->session()->put('qtyid', $sqtyid);
            $request->session()->put('stitle', $stitle);
            $request->session()->put('spicture', $spicture);
            $request->session()->put('sprice', $sprice);
            $request->session()->put('totalprice', $totalprice);
            echo $totalprice;
        }else{

            $request->session()->forget(['pdtid', 'qtyid', 'totalprice', 'stitle', 'spicture', 'sprice']);
            echo 0;
        }
    }
}
