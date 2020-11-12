<?php

namespace App\Http\Controllers\front;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use App\Payment;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CardController extends Controller
{
    public function addtoCard(Request $request, $id)
    {
        $product = Product::with('photos')->whereId($id)->first();
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return back();
    }

    public function removefromCard(Request $request, $id)
    {
        $product = Product::whereId($id)->first();
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->remove($product, $product->id);
        $request->session()->put('cart', $cart);
        return back();
    }

    public function checkout()
    {

        /*
         * addresses of user
         */
        $addresses = Auth::user()->addresses()->get();

        return view('front.cartCheckout', compact('addresses'));
    }

    public function handleCheckout(Request $request)
    {
        $this->validate($request, [
            'address_id' => 'required',
            'delivery_type' => 'required',
            'payment_method' => 'required',
            'confirm_agree' => 'required'
        ]);

        DB::transaction(function () use ($request) {

            $order = new Order();
            $order->fill($request->only(['address_id', 'delivery_type', 'description', 'description']));
            $order->save();

            OrderItem::insert($this->calculateOrderItems($order->id));

            Payment::create([
                'order_id' => $order->id,
                'method' => $request->get('payment_method'),
                'status' => Payment::PENDING
            ]);
        });

        \session()->forget('cart');
        return view('front.successCheckout');
    }

    public function calculateOrderItems($order_id)
    {
        $order_items = [];


        foreach (session('cart')->items as $product) {
            $order_items[] = [
                'order_id' => $order_id,
                'product_id' => $product['item']->id,
                'count' => $product['qty']
            ];
        }
        return $order_items;
    }
}
