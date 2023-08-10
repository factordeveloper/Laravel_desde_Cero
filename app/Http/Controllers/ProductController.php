<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
       
       $name = config('app.undefined', 'welcome');  /// View not found

       dump($name); // imprime datos sin cortar la ejecución
       //dd();   // imprime datos y detiene la ejecucion
       return view('products.index');


       return view($name);
    }

    public function create(){
        //
    }

    public function store(){
       //
    }

    public function show($product){
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
