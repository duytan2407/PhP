<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;

class PageController extends Controller
{
    public function index()
    {
         $slide = Slide::all();
        $new_product = Product::where('new',1)->paginate(4);
       $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }
     public function getSp()
    {
         // $sp_theoloai = Product::where('id_type',$type)->get();
        // // $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        // // $loai = ProductType::all();
        // // $loap_sp = ProductType::where('id',$type)->first();
        // return view('page.loai_sanpham',compact('sp_theoloai'));
        return view('page.loai_sanpham');
    }
    public function getchitiet(Request $req)
    {
        $sanpham= Product::where('id',$req->id)->first();
        return view('page.chitiet_sp',compact('sanpham'));
    }
     public function getlienhe()
    {
        return view('page.lienhe');
    }
      public function getabout()
    {
        return view('page.gioithieu');
    }
}

