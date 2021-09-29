<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Cart;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //add order
    public function addOrder(Request $req) {
        $order = new Order;
        $order->email = $req->input('email');
        $order->name = $req->input('name');
        $order->address = $req->input('address');
        $order->city = $req->input('city');
        $order->province = $req->input('province');
        $order->address = $req->input('postalcode');
        $order->phone = $req->input('phone');
        $order->subtotal = $req->input('subtotal');

        $user_id = $req->input('user_id');

        $order->user_id = $user_id;

        $order->save();

        $cart = Cart::where('user_id', $user_id)->first();
        $products = Cart::where('user_id', $user_id)->first()->products;
        
        foreach ($products as $key => $product) {
            $product->carts()->detach($cart);
        }

        return $order;
    }
}
