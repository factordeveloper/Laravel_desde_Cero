@extends('layouts.app')

@section('content')

<h1>Editar un producto</h1>

<form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST">

@csrf
@method('PUT')

<div class="form-row">
    <label for="">Title</label>
    <input class="form-control" type="text" name="title" value="{{ old('title') ?? $product->title }}" required>
</div>

<div class="form-row">
    <label for="">Description</label>
    <input class="form-control" type="text" name="description" value="{{ old('description') ?? $product->description }}" required>
</div>

<div class="form-row">
    <label for="">Price</label>
    <input class="form-control" type="number" min="1.00" step="0.01" name="price" value="{{ old('price') ?? $product->price }}" required>
</div>

<div class="form-row">
    <label for="">Stock</label>
    <input class="form-control" type="number" min="0" name="stock" value="{{ old('stock') ?? $product->stock }}" required>
</div>

<div class="form-row">
    <label for="">Status</label>
     <select name="status" class="custom-select" value="{{ $product->status }}"  required>

    <option {{ old('status') == 'DISPONIBLE' ? 'selected' : ($product->status == 'DISPONIBLE' ? 'selected' : '')}} value="DISPONIBLE" name="status">DISPONIBLE</option>
    <option {{ old('status') == 'NO DISPONIBLE' ? 'selected' : ($product->status == 'NO DISPONIBLE' ? 'selected' : '')}} value="NO DISPONIBLE" name="status">NO DISPONIBLE</option>

     </select>
</div>

<div class="form-row mt-3">
     <button type="submit" class="btn btn-primary btn-lg">Actualizar Producto</button>
</div>

</form>

@endsection





