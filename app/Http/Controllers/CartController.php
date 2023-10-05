<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Services\CartService;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService){
        $this->cartService = $cartService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('carts.index')->with([
            'cart' => $this->cartService->getFromCookieOrCreate(),
        ]);

    }

   
    
}
