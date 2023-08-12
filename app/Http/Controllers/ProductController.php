<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){

       $products =  Product::all();

      /*  return view('products.index')->with([
            'products'=> $products,
        ]);
      */
        return view('products.index', compact('products'));
  

    }

    public function create(){
        
        return view('products.create');
    }

    public function store(){
       
      /*
      $product =  Product::create([
              
             'title' => request()->title,
             'description' => request()->description,
             'price' => request()->price,
             'stock' => request()->stock,
             'status' => request()->status,

        ]);

       */
        $product = Product::create(request()->all());

       // return redirect()->back();  // redirigir a la misma pagina

        return redirect()->route('products.index');

        //  return redirect()->action('ProductController@index');  //no me funciono

        return $product;
        

    }

    public function show($product){

     $product = Product::findOrFail($product);  // 404 NOT FOUND si no existe id

     //dd($product);

   /* return view('products.show')->with([
        'product' => $product,
        
    ]);
   */
    return $product;
        
    }

    public function edit($product){

        return view('products.edit')->with([
            'product' => Product::findOrFail($product),
        ]);




        return "editar producto con id {$product}";
    }

    public function update($product){
        
        $product = Product::findOrFail($product);

        $product->update(request()->all());

       // return $product;
       return redirect()->route('products.index');

    }

    public function destroy($product){
    
        $product = Product::findOrFail($product);

        $product->delete();

       // return $product;
        return redirect()->route('products.index');

    }
    
}
