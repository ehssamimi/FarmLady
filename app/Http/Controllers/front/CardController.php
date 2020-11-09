<?php

namespace App\Http\Controllers\front;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CardController extends Controller
{
    public function addtoCard(Request $request,$id)
    {
        $product=Product::with('photos')->whereId($id)->first();
        $oldcart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldcart);
        $cart->add($product,$product->id);
        $request->session()->put('cart',$cart);
        return back();
    }
    public function removefromCard(Request $request,$id)
    {
        $product=Product::whereId($id)->first();
        $oldcart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldcart);
        $cart->remove($product,$product->id);
        $request->session()->put('cart',$cart);
        return back();
    }
}
