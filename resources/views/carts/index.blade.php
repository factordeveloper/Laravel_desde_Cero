@extends('layouts.app')

@section('content')
  <h1>Tu carrito...</h1>
    @if(!isset($cart) || $cart->products->isEmpty())
         <div class="alert alert-warning" role="alert">
           <h4 class="alert-heading">No products</h4>
           <p>Carrito vacio...</p>
           <hr>
           <p class="mb-0">Alert Description</p>
         </div>
         @else

  <div class="row">
     @foreach ($cart->products as $producto)
     <div class="col-3">
         @include('components.products-card')
     </div>
     @endforeach
     
  </div>
            
  @endempty
 @endsection