<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function getProducts($user_id)
    {
        return Wishlist::where('user_id', $user_id)->first()->products;
    }

    function addWishlist($user){
        
        $wishlist= new Wishlist;
        $wishlist->user_id = $user;
        $wishlist->save();
        return $wishlist;
    }
}
