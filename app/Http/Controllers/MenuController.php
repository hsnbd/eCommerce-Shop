<?php

namespace App\Http\Controllers;

use App\category;
use App\Menu;
use App\subcategory;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $allCat = category::all();
        $allscat = subcategory::all();
        $allmenu = Menu::all();
        //return $allmenu;
        return view('Admin.menu',compact('allCat','allscat','allmenu'));
    }
    public function Store(Request $request){

        $menu_items = $request->menu;

          Menu::truncate();
         foreach($menu_items as $items=>$value){
            $data = [
                'catid' => $value
            ];
            Menu::create($data);
         }
            return redirect()->back()->withMsg('Menu items update');
    }
}
