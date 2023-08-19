@extends('layouts.app')

@section('content')

<h1>Crear un producto</h1>

<form action="{{ route('products.store') }}" method="POST">

@csrf

<div class="form-row">
    <label for="">Title</label>
    <input class="form-control" type="text" name="title" value="{{ old('title') }}">
</div>

<div class="form-row">
    <label for="">Description</label>
    <input class="form-control" type="text" name="description" value="{{ old('description') }}">
</div>

<div class="form-row">
    <label for="">Price</label>
    <input class="form-control" type="number" min="1.00" step="0.01" name="price" value="{{ old('price') }}">
</div>

<div class="form-row">
    <label for="">Stock</label>
    <input class="form-control" type="number" min="0" name="stock" value="{{ old('stock') }}">
</div>

<div class="form-row">
    <label for="">Status</label>
     <select name="status" class="custom-select">

         <option value="" selected>Seleccione....</option>
         <option {{ old('status') == 'DISPONIBLE' ? 'selected' : ''}} value="DISPONIBLE" name="status">DISPONIBLE</option>
         <option {{ old('status') == 'NO DISPONIBLE' ? 'selected' : ''}} value="NO DISPONIBLE" name="status">NO DISPONIBLE</option>

     </select>
</div>

<div class="form-row">
     <button type="submit" class="btn btn-primary btn-lg">Crear Producto</button>
</div>

</form>

@endsection





