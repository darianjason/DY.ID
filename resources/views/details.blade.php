@extends('templates.master')

@section('title', 'Product Details - DY.ID')

@section('content')
    <div id="product-details">
        <h3>{{ $product->name }}</h3>

        <h4>Category:</h4>
        <p>{{ $product->category->name }}</p>

        <h4>Price:</h4>
        <p>{{ $product->detail->price }}</p>

        <h4>Description:</h4>
        <p>{{ $product->detail->description }}</p>
    </div>
@endsection
