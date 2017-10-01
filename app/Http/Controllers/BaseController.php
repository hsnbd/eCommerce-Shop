<?php

namespace App\Http\Controllers;
use App\category;
use App\product;
use App\Slider;
use App\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\StoreInfo;

class BaseController extends Controller
{
   public function index(){
       $alldata = $this->CallRaw("home");
       //return $alldata;
       $allslide = Slider::all();
       return view('main-page',compact('alldata','allslide'));
               
   }
   public function contact(){
       $storeinfo = StoreInfo::where('id',1)->first();
       return view('contact',compact('storeinfo'));
   }
   public function category($cid,$cname){
       $allCatPdt = category::select('categories.id','categories.name as cname','scat.name as scname',"pdt.id", "pdt.title", "pdt.price", "pdt.vat", "pdt.discount", "pdt.picture1", "pdt.picture2", "pdt.picture3", "pdt.default_picture")
           ->join('subcategories as scat','categories.id' ,'=','scat.categoriesid')
           ->join('products as pdt','pdt.subcategoriesid','=','scat.id')
           ->where('categories.id',$cid)
           ->get();
       //return $allCatPdt;
    return view('categories',compact('allCatPdt'));
   }
   public function checkout(Request $request){

       if(Session::has('pdtid')){
           $spdtid = $request->session()->get('pdtid');
           $product = DB::table('products')->whereIn('id',$spdtid)->get();
           return view('checkout',compact('product'));
       }else{
           return redirect('/');
       }

   }
   public function singleView($cname,$scname,$id){
       $allreview = DB::table('review_products')->where('product_id',$id)->paginate(5);
       $allpdt = product::where('id',$id)->first();
       $scid = $allpdt->subcategoriesid;
       $allscat = DB::table('products as pdt')->where('subcategoriesid',$scid)
           ->select("pdt.id", "pdt.title", "pdt.price", "pdt.vat", "pdt.discount", "pdt.picture1", "pdt.picture2", "pdt.picture3", "pdt.default_picture", "cat.name as cname", "scat.name as scname")
           ->join('subcategories as scat', "scat.id", "=", "pdt.subcategoriesid")
           ->join("categories as cat", "cat.id", "=", "scat.categoriesid")
           ->limit(4)
           ->get();
       //return $allscat;
       return view('single',compact('allpdt','allscat','allreview'));
  }

  public static function CallRaw($procName, $parameters = null, $isExecute = false) {
    $syntax = '';
    for ($i = 0; $i < count($parameters); $i++) {
      $syntax .= (!empty($syntax) ? ',' : '') . '?';
    }
    $syntax = 'CALL ' . $procName . '(' . $syntax . ');';

    $pdo = DB::connection()->getPdo();
    $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, true);
    $stmt = $pdo->prepare($syntax, [\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL]);
    for ($i = 0; $i < count($parameters); $i++) {
      $stmt->bindValue((1 + $i), $parameters[$i]);
    }
    $exec = $stmt->execute();
    if (!$exec)
      return $pdo->errorInfo();
    if ($isExecute)
      return $exec;

    $results = [];
    do {
      try {
        $results[] = $stmt->fetchAll(\PDO::FETCH_OBJ);
      } catch (\Exception $ex) {
        
      }
    } while ($stmt->nextRowset());


    if (1 === count($results))
      return $results[0];
    return $results;
  }
  

            
}
