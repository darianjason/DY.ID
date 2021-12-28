@extends('templates.master')

@section('title', 'DY.ID')

@section('content')
    <h2>Products</h2>

    <div id="product-list">
        @foreach ($products as $product)
            <div class="product">
                <div class="image-container">
                    <a href="/details/{{ $product->id }}">
                        <img src="" alt="">
                    </a>
                </div>
                <div id="details">
                    <a id="name" href="/details/{{ $product->id }}">
                        {{ $product->name }}
                    </a>

                    <p id="price">
                        IDR {{ $product->detail->price }}
                    </p>

                    <p id="category">
                        {{ $product->category->category }}
                    </p>
                </div>

                <button class="button-details">More Details</button>
            </div>
        @endforeach
    </div>
@endsection
