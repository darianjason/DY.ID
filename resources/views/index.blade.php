@extends('templates.master')

@section('title', 'DY.ID')

@section('content')
    <h2>Products</h2>

    <div id="product-list">
        @foreach ($products as $product)
            <div class="product">
                <div class="image-container">
                    <a href="/product/{{ $product->id }}">
                        <img src="{{ Storage::url($product->detail->image) }}" alt="{{ $product->name }}">
                    </a>
                </div>

                <div id="details">
                    <a id="name" href="/product/{{ $product->id }}">
                        {{ $product->name }}
                    </a>

                    <p id="price">
                        IDR {{ $product->detail->price }}
                    </p>

                    <p id="category">
                        {{ $product->category->name }}
                    </p>
                </div>

                <a href="/product/{{ $product->id }}">
                    <button class="button-details">More Details</button>
                </a>
            </div>
        @endforeach

        <div>
            {{ $products->withQueryString()->links() }}
        </div>
    </div>
@endsection
