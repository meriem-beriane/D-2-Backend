<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;

class ProductController extends Controller
{
    function addProductToCart(Request $req){
        $product= new Product;
        $product->name = $req->input('name');
        $product->price = $req->input('price');
        $product->img = $req->input('image');
        $product->price_value = $req->input('priceV');
        $user_id = $req->input('user_id');

        $product->save();

        $cart = Cart::where('user_id', $user_id)->first();
        $product->carts()->attach($cart);

        return $product;
    }

    function addProductToWishlist(Request $req){
      $product= new Product;
      $product->name = $req->input('name');
      $product->price = $req->input('price');
      $product->img = $req->input('image');
      $product->price_value = $req->input('priceV');
      $user_id = $req->input('user_id');

      $product->save();

      $wishlist = Wishlist::where('user_id', $user_id)->first();
      $product->wishlists()->attach($wishlist);

      return $product;
  }


  function deleteFromCart(Request $req){

    $user_id = $req->input('user_id');
    $product_id = $req->input('product_id');

    $product = Product::find($product_id);
    $cart = Cart::where('user_id', $user_id)->first();
    
    $product->carts()->detach($cart);
        
    return 'Success';

  }
    
  function deleteFromWishlist(Request $req){
    
    $user_id = $req->input('user_id');
    $product_id = $req->input('product_id');

    $product = Product::find($product_id);
    $wishlist = Wishlist::where('user_id', $user_id)->first();
    
    $product->wishlists()->detach($wishlist);
        
    return 'Success';
  }
  
}