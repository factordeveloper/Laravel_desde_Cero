@extends('layouts.template')


@section('content')


     <h1>List of Products</h1>

     <a class="btn btn-success" href="{{ route('products.create') }}">Crear Producto</a>

 
     @if(empty($products))
     {{--  @empty($products) --}}

        <div class="alert alert-warning">
             Lista de productos vacia.....
         </div>

    @else

    <div class="table-responsive">
        <table class="table-table-striped">
            <thead class="thead-light">
                 <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>PRICE</th>
                    <th>STOCK</th>
                    <th>STATUS</th>
                    <th>ACTIONS</th>
                 </tr>
            </thead>
            <tbody>
             @foreach($products as $producto)

                <tr>
                  <td>{{ $producto->id}}</td>
                  <td>{{ $producto->title}}</td>
                  <td>{{ $producto->description}}</td>
                  <td>{{ $producto->price}}</td>
                  <td>{{ $producto->stock}}</td>
                  <td>{{ $producto->status}}</td>
                  <td>
                    <a class="btn btn-link" href="{{ route('products.show', ['product' => $producto->id]) }}">Mostrar</a>
                    <a class="btn btn-link" href="{{ route('products.edit', ['product' => $producto->id]) }}">Editar</a>
                  </td>
                </tr>

             @endforeach    
            </tbody>
        </table>
  
    </div>

    @endif
    {{-- @endempty --}}

    @endsection





