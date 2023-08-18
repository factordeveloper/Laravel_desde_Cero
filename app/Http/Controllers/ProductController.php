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
       
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:DISPONIBLE,NO DISPONIBLE'],
          
        ];

        request()->validate($rules);

       if(request()->status == 'DISPONIBLE' && request()->stock == 0) {
            /// flash() para mostrar solo en form | withErrors
          // session()->flash('error', 'si esta disponible, debe haber stock');

           return redirect()
           ->back()
           ->withInput(request()->all())
           ->withErrors('si esta disponible, debe haber stock');

       }
      
        $product = Product::create(request()->all());

        //session()->flash('success', "El nuevo producto id : {$product->id} ha sido creado");

        return redirect()
             ->route('products.index')
             ->withSuccess("El nuevo producto id : {$product->id} ha sido creado");
             // ->with(['success' => ""El nuevo producto id : {$product->id} ha sido creado"]);

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

        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:DISPONIBLE,NO DISPONIBLE'],
          
        ];

        request()->validate($rules);
        
        $product = Product::findOrFail($product);

        $product->update(request()->all());

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
