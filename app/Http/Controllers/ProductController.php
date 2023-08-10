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

     $product = Product::findOrFail($product);  // 404 NOT FOUND si no existe id

     //dd($product);

    return view('products.show')->with([
        'element' => $product,
    ]);
        
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
