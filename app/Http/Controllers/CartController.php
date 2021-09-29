<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function getProducts($user_id)
    {
        return Cart::where('user_id', $user_id)->first()->products;
    }

    function addCart($user){
        
        $cart= new Cart;
        $cart->user_id = $user;
        $cart->save();
        return $cart;
    }

}