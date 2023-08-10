<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){

       $products =  Product::all();

        return view('products.index');

    }

    public function create(){
        //
    }

    public function store(){
       //
    }

    public function show($product){

    // $product = Product::find($product);   // null si no existe id

     $product = Product::findOrFail($product);  // 404 NOT FOUND si no existe id
     //return $product;
     dd($product);

    return view('products.show');
        
    }

    public function edit($product){
        return "editar producto con id {$product}";
    }

    public function update($product){
        ///
    }

    public function destroy($product){
       ///
    }
    
}
