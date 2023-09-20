<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{


    public function __construct(){
       // $this->middleware('auth')->except(['index', 'create']);
       $this->middleware('auth');
    }


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

    public function store(ProductRequest $request){
       

        $product = Product::create($request->validated());

        //session()->flash('success', "El nuevo producto id : {$product->id} ha sido creado");

        return redirect()
             ->route('products.index')
             ->withSuccess("El nuevo producto id : {$product->id} ha sido creado");
             // ->with(['success' => ""El nuevo producto id : {$product->id} ha sido creado"]);

    }

    public function show(Product $product){

    // $product = Product::findOrFail($product);  // 404 NOT FOUND si no existe id

     //dd($product);

    return view('products.show')->with([
        'product' => $product,
        
    ]);
   
    return $product;
        
    }

    public function edit($product){

        return view('products.edit')->with([
            'product' => Product::findOrFail($product),
        ]);




        return "editar producto con id {$product}";
    }

    public function update(ProductRequest $request, Product $product){

    

        $product->update($request->all());

       // return $product;
       return redirect()
             ->route('products.index')
             ->withSuccess("El nuevo producto id : {$product->id} ha sido actualizado");

    }

    public function destroy($product){
    
        $product = Product::findOrFail($product);

        $product->delete();

       // return $product;
        return redirect()
        ->route('products.index')
        ->withSuccess("El nuevo producto id : {$product->id} ha sido eliminado");;


    }
    
}
