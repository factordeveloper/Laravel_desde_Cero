<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\CartService;
use Illuminate\Support\Facades\Cookie;

class ProductCartController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService){
        $this->cartService = $cartService;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        $cart = CartService::getFromCookieOrCreate();

       // $cart = Cart::create();

        $quantity = $cart->products()
                   ->find($product->id)
                   ->pivot
                   ->quantity ?? 0;

        $cart->products()->syncWithoutDetaching([
            $product->id => ['quantity' => $quantity + 1], 
        ]);

       $cookie = $this->cartService->makeCookie($cart);

       // $cookie = Cookie::make('cart', $cart->id, 7 * 24 * 60);

        return redirect()->back()->cookie($cookie);
    }

  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, Cart $cart)
    {
        $cart->products()->detach($product->id);

     $cookie =  $this->cartService->makeCookie($cart);

       return redirect()->back()->cookie($cookie);


    }





}
