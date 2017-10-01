<?php

namespace App\Http\Controllers;

use App\product;
use App\subcategory;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function Search(Request $request){
        $this->validate($request, [
            'stext' => 'required'
        ]);
        $title = $request->stext;
        $catid = $request->category;
        if($catid == 0){
            $results = product::select("products.id", "products.title", "products.price", "products.vat", "products.discount", "products.picture1", "products.picture2", "products.picture3", "products.default_picture", "cat.name as cname", "scat.name as scname")
                ->where('title','LIKE','%'.$title.'%')
                ->orWhere('scat.name', 'LIKE','%'.$title.'%')
                ->orWhere('cat.name', 'LIKE','%'.$title.'%')
                ->join('subcategories as scat','scat.id','=','products.subcategoriesid')
                ->join('categories as cat','cat.id','=','scat.id')
                ->get();
        }else{
            $subcatid = subcategory::where('categoriesid',$catid)->first();
            $subcatid= $subcatid->id;
            $results = product::select("products.id", "products.title", "products.price", "products.vat", "products.discount", "products.picture1", "products.picture2", "products.picture3", "products.default_picture", "cat.name as cname", "scat.name as scname")
                ->where('subcategoriesid',$subcatid)
                ->where('title','LIKE','%'.$title.'%')
                ->join('subcategories as scat','scat.id','=','products.subcategoriesid')
                ->join('categories as cat','cat.id','=','scat.id')
                ->get();
        }
    return view('search',compact('results'));
    }
}
