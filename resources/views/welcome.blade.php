@extends('layouts.app')

@section('content')

    @empty($products)
         <div class="alert alert-danger" role="alert">
           <h4 class="alert-heading">No products</h4>
           <p>No hay productos</p>
           <hr>
           <p class="mb-0">Alert Description</p>
         </div>
         @else

  <div class="row">
     @foreach ($products as $producto)
     <div class="col-3">
         @include('components.products-card')
     </div>
     @endforeach
     
  </div>
            
  @endempty
 @endsection()
