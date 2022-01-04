@extends('templates.master')

@section('title', 'DY.ID')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheets/index.css') }}">
@endsection

@section('content')
    <h2>Products</h2>

    <div id="product-list">
        @foreach ($products as $product)
            <div class="product">
                <a href="/product/{{ $product->id }}">
                    <img src="{{ Storage::url($product->detail->image) }}" alt="{{ $product->name }}">
                </a>

                <div class="details">
                    <div>
                        <h3>
                            <a class="name" href="/product/{{ $product->id }}">
                                {{ $product->name }}
                            </a>
                        </h3>
                    </div>

                    <div>
                        <p class="price">
                            <span class="material-icons-round">
                                sell
                            </span>
                            IDR {{ $product->detail->price }}
                        </p>
                    </div>

                    <div>
                        <p class="category">
                            <span class="material-icons-round">
                                category
                            </span>
                            {{ $product->category->name }}
                        </p>
                    </div>

                    <a href="/product/{{ $product->id }}">
                        <button class="button-details">More Details</button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div>
        {{ $products->withQueryString()->links() }}
    </div>
@endsection
