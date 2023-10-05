<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;

class CartService
{
    protected $cookieName = 'cart';

    public static function getFromCookie(){


        $cartId = Cookie::get('cart');

        $cart = Cart::find($cartId);

        return $cart;

    }



    public static function getFromCookieOrCreate(){

        $cart = CartService::getFromCookie();


        return $cart ?? Cart::create();

    }

    public function makeCookie(Cart $cart)
    {
       return  Cookie::make('cart', $cart->id, 7 * 24 * 60);
    }

    public function countProducts(){

        $cart = $this->getFromCookie();

        if($cart != null){
            return $cart->products->pluck('pivot.quantity')->sum(); 
        }

        return 0;
    }


}