<?php

namespace App\Http\Controllers;

use App\category;
use App\size;
use App\subcategory;
use App\unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\product;

class productsmanagement extends Controller {

    public function index() {
        $subcategories = subcategory::select()->get();
        $allcategories = category::select()->get();
        $allsize = size::select()->get();
        $allunits = unit::select()->get();
        return view('admin/products')->with(['categories' => $allcategories, 'size' => $allsize, 'units' => $allunits, 'subcategories' => $subcategories]);
    }

    public function productView() {
        $allproduct = DB::table('products as pdt')
                ->select("pdt.id", "pdt.title", "pdt.price", "pdt.vat", "pdt.discount", "pdt.picture1", "pdt.picture2", "pdt.picture3", "pdt.default_picture", "cat.name as cname", "scat.name as scname")
                ->join('subcategories as scat', "scat.id", "=", "pdt.subcategoriesid")
                ->join("categories as cat", "cat.id", "=", "scat.categoriesid")
                ->get();
        return view('admin/productView', compact('allproduct'));
    }

    public function store(Request $request) {

        $this->validate($request, [
            'title' => 'required|max:100|unique:products,title',
            'descr' => 'required',
            'price' => 'required',
            'vat' => 'required',
            'stock' => 'required',
            'unitsid' => 'required|exists:units,id',
            'default_pic' => 'required'
        ]);
        $file1 = $request->picture1;
        if ($file1) {
            $ext1 = strtolower($file1->getClientOriginalExtension());
            if ($ext1 != 'jpg' && $ext1 != 'jpeg' && $ext1 != 'png' && $ext1 = 'gif') {
                $ext1 = "";
            }
        }
        $file2 = $request->picture2;
        if ($file2) {
            $ext2 = strtolower($file2->getClientOriginalExtension());
            if ($ext2 != 'jpg' && $ext2 != 'jpeg' && $ext2 != 'png' && $ext2 = 'gif') {
                $ext2 = "";
            }
        }
        $file3 = $request->picture3;
        if ($file3) {
            $ext3 = strtolower($file3->getClientOriginalExtension());
            if ($ext3 != 'jpg' && $ext3 != 'jpeg' && $ext3 != 'png' && $ext3 = 'gif') {
                $ext3 = "";
            }
        }


        $data = [
            'title' => $request->title,
            'description' => $request->descr,
            'price' => $request->price,
            'vat' => $request->vat,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'weight' => $request->weight,
            'unitsid' => $request->unitsid,
            'size' => $request->sizeid,
            'subcategoriesid' => $request->subcategoriesid,
            'picture1' => $ext1,
            'picture2' => $ext2,
            'picture3' => $ext3,
            'default_picture' => $request->default_pic
        ];



        $id = product::create($data)->id;
        if ($ext1) {
            $file1->move("images/product", "product-1-{$id}.{$ext1}");
        }
        if ($ext2) {
            $file2->move("images/product", "product-2-{$id}.{$ext2}");
        }
        if ($ext3) {
            $file3->move("images/product", "product-3-{$id}.{$ext3}");
        }
        return back()->with('messege', 'Product Insert Successfully');
    }

    public function productEdit($id) {
        $subcategories = subcategory::select()->get();
        $allcategories = category::select()->get();
        $allsize = size::select()->get();
        $allunits = unit::select()->get();
        $selproduct = product::select()->where('id', '=', $id)->get();

        return view('Admin/productsEdit')
                        ->with([
                            'categories' => $allcategories,
                            'size' => $allsize,
                            'units' => $allunits,
                            'subcategories' => $subcategories,
                            'products' => $selproduct
        ]);
    }

    public function productUpdate($id, Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'descr' => 'required',
            'price' => 'required',
            'vat' => 'required',
            'stock' => 'required',
            'unitsid' => 'required|exists:units,id',
            'default_pic' => 'required'
        ]);
        $selPdt = DB::table("products")->select("*")->where("id", "=", $id)->paginate(1);
        foreach ($selPdt as $pdt) {
            $old_ext1 = $pdt->picture1;
            $old_ext2 = $pdt->picture2;
            $old_ext3 = $pdt->picture3;
        }

        $file1 = $request->picture1;
        if ($file1) {
            $ext1 = strtolower($file1->getClientOriginalExtension());
            if ($ext1 != 'jpg' && $ext1 != 'jpeg' && $ext1 != 'png' && $ext1 = 'gif') {
                $ext1 = $old_ext1;
            } else {
                if (file_exists("images/product/product-1-{$id}.{$old_ext1}")) {
                    unlink("images/product/product-1-{$id}.{$old_ext1}");
                }
                $file1->move("images/product", "product-1-{$id}.{$ext1}");
            }
        } else {
            $ext1 = $old_ext1;
        }

        $file2 = $request->picture2;
        if ($file2) {
            $ext2 = strtolower($file2->getClientOriginalExtension());
            if ($ext2 != 'jpg' && $ext2 != 'jpeg' && $ext2 != 'png' && $ext2 = 'gif') {
                $ext2 = $old_ext2;
            } else {
                if (file_exists("images/product/product-2-{$id}.{$old_ext2}")) {
                    unlink("images/product/product-2-{$id}.{$old_ext2}");
                }
                $file2->move("images/product", "product-2-{$id}.{$ext2}");
            }
        } else {
            $ext2 = $old_ext2;
        }


        $file3 = $request->picture3;
        if ($file3) {
            $ext3 = strtolower($file3->getClientOriginalExtension());
            if ($ext3 != 'jpg' && $ext3 != 'jpeg' && $ext3 != 'png' && $ext3 = 'gif') {
                $ext3 = $old_ext3;
            } else {
                if (file_exists("images/product/product-3-{$id}.{$old_ext3}")) {
                    unlink("images/product/product-3-{$id}.{$old_ext3}");
                }
                $file3->move("images/product", "product-3-{$id}.{$ext3}");
            }
        } else {
            $ext3 = $old_ext3;
        }
        $data = [
            'title' => $request->title,
            'description' => $request->descr,
            'price' => $request->price,
            'vat' => $request->vat,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'weight' => $request->weight,
            'unitsid' => $request->unitsid,
            'size' => $request->sizeid,
            'subcategoriesid' => $request->subcategoriesid,
            'picture1' => $ext1,
            'picture2' => $ext2,
            'picture3' => $ext3,
            'default_picture' => $request->default_pic
        ];
        DB::table('products')->where('id', '=', $id)->update($data);
        return redirect('/product/view')->with('msessege', 'Product Update Success');
    }

    public function productDelete($id) {

        $selPdt = DB::table("products")->select("*")->where("id", "=", $id)->paginate(1);
        foreach ($selPdt as $pdt) {
            $old_ext1 = $pdt->picture1;
            $old_ext2 = $pdt->picture2;
            $old_ext3 = $pdt->picture3;
        }
        if (file_exists("images/product/product-1-{$id}.{$old_ext1}")) {
            unlink("images/product/product-1-{$id}.{$old_ext1}");
        }
        if (file_exists("images/product/product-2-{$id}.{$old_ext2}")) {
            unlink("images/product/product-2-{$id}.{$old_ext2}");
        }
        if (file_exists("images/product/product-3-{$id}.{$old_ext3}")) {
            unlink("images/product/product-3-{$id}.{$old_ext3}");
        }

        DB::table('products')->where('id', '=', $id)->delete();
        return redirect('/product/view')->with('msg','Delete Success');
    }

}
