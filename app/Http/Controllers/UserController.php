<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\facades\Hash;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;

class UserController extends Controller
{
    //Register
    function register(Request $req){

        $user = new User;
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->password = Hash::make($req->input('password'));

        $user->save();

        $user1 = User::where('email', $req->email)->first();

        app('App\Http\Controllers\CartController')->addCart($user->id);
        app('App\Http\Controllers\WishlistController')->addWishlist($user->id);

        return $user;
    }

    //login
    function login(Request $req) {
        
        $user = User::where('email', $req->email)->first();
        if(!$user || !Hash::check($req->password, $user->password)) {
            return ["error"=> "Email or password is not matched"];
        }

        return $user;
    }
    
    function getOrders($user_id) {
        
        return $orders = User::find($user_id)->orders;
    }
}