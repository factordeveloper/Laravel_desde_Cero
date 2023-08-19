@extends('layouts.app')

@section('content')

    <h1>{{ $product-> title }} ({{ $product-> id }})</h1>
    <h3>{{ $product-> description }}</h3>
    <h3>{{ $product-> price }}</h3>
    <h3>{{ $product-> stock }}</h3>
    <h3>{{ $product-> status }}</h3>


@endsection
