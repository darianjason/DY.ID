@extends('templates.master')

@section('title', 'Product Details')

@section('content')
    <div id="product-details">
        <div>
            <img src="{{ Storage::url($product->detail->image) }}" alt="{{ $product->name }}">
        </div>

        <div id="details-right">
            <h3>{{ $product->name }}</h3>
    
            <h4>Category:</h4>
            <p>{{ $product->category->name }}</p>
    
            <h4>Price:</h4>
            <p>{{ $product->detail->price }}</p>
    
            <h4>Description:</h4>
            <p>{{ $product->detail->description }}</p>

            @guest
                <a href="/login">
                    <button>Log in to buy</button>
                </a>
            @endguest

            @auth
                @if (Auth::user()->role == 'member')
                    <form action="" method="post"></form>
                @endif
            @endauth
        </div>
    </div>
@endsection
