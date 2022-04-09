<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use App\Cart;
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
        return view('page.loai_sanpham');
    }
    public function getchitiet()
    {
        return view('page.chitiet_sp');
    }
    public function getlienhe()
    {
        return view('page.lienhe');
    }
    public function getAddtoCart(Request $req,$id)
    {
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }
    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
}

